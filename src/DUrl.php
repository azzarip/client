<?php

namespace Azzarip\Client;

use Azzarip\Client\CookieConsent\CookieConsent;
use Illuminate\Support\Arr;

class DUrl
{
    public function __construct(public string $uri, public string $domainKey, public array $data = [])
    {
        if (empty(config('domains.'.$this->domainKey))) {
            throw new \Exception('Wrong domain in durl.');
        }
    }

    public function url()
    {

        $url = config("domains.{$this->domainKey}.url");

        $path = ltrim($this->uri, '/');

        if (! empty($path)) {
            $url .= '/'.$path;
        }

        if (! empty($data)) {
            $url .= '?'.Arr::query($data);
        }

        if (request()->isSecure()) {
            return 'https://'.$url;
        }

        return 'http://'.$url;

    }

    public function withCookieConsent()
    {
        $cookieConsent = CookieConsent::get();
        if ($cookieConsent) {
            $this->data['cc'] = $cookieConsent->toUrl();
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->url();
    }
}
