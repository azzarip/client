<?php

namespace Azzarip\Client\CookieConsent;

use Illuminate\Support\Facades\Cookie;

class CookieConsent
{
    const VERSION = '1.0';

    const CATEGORIES = [
        'optional', 'analytics', 'marketing',
    ];

    protected $cookieValue = [];

    public function __construct($selected)
    {
        $this->cookieValue = array_fill_keys($selected, 'granted');
    }

    public function setConsent()
    {
        $cookie = [
            'timestamp' => now(),
            'consent' => $this->cookieValue,
            'version' => self::VERSION,
        ];
        Cookie::queue('cookie_consent', json_encode($cookie), 365 * 24 * 60, null, null, false, false);

        return $this;
    }

    public static function acceptAll()
    {
        return new self(self::CATEGORIES);
    }

    public static function acceptEssentials()
    {
        return new self([]);
    }

    public static function accept($selected = []): self
    {
        return new self($selected);
    }

    public static function get(): ?self
    {
        if (! Cookie::has('cookie_consent')) {
            return self::getFromUrl();
        }

        $consent = Cookie::get('cookie_consent');
        $consent = json_decode($consent, true);

        if (($consent['version'] ?? null) != self::VERSION) {
            return null;
        }

        $selected = array_keys($consent['consent']);

        return new self($selected);
    }

    public function toUrl(): string
    {
        $value = '';
        foreach (self::CATEGORIES as $category) {
            if (array_key_exists($category, $this->cookieValue)) {
                $value .= 1;
            } else {
                $value .= 0;
            }
        }

        return $value;
    }

    protected static function getFromUrl(): ?self
    {
        if (! request()->has('cc')) {
            return null;
        }

        $consent = request()->query('cc');

        $size = count(self::CATEGORIES);
        $pattern = "/^(?:[01]{{$size}})$/";

        if (! preg_match($pattern, $consent)) {
            return null;
        }

        $selected = [];
        for ($i = 0; $i < $size; $i++) {
            $category = (bool) $consent[$i];
            if ($category) {
                $selected[] = self::CATEGORIES[$i];
            }
        }

        return (new self($selected))->setConsent();
    }
}
