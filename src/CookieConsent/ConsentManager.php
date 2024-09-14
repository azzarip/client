<?php

namespace Azzarip\Client\CookieConsent;

use Livewire\Component;

class ConsentManager extends Component
{
    public $show = true;

    public $selected = [];

    public function acceptAll()
    {
        $this->setConsent(CookieConsent::acceptAll());
    }

    public function acceptSelected()
    {
        $this->setConsent(CookieConsent::accept($this->selected));
    }

    public function acceptEssentials()
    {
        $this->setConsent(CookieConsent::acceptEssentials());
    }

    public function boot()
    {
        $cookieConsent = CookieConsent::get();

        if ($cookieConsent) {
            $this->skipRender();
        }
    }

    public function render()
    {
        $this->selected = CookieConsent::CATEGORIES;

        return view('azzarip::cookie-consent', [
            'cookieCategories' => CookieConsent::CATEGORIES,
        ]);
    }

    private function setConsent(CookieConsent $cookieConsent)
    {
        $cookieConsent->setConsent();
        $this->show = false;
        $this->dispatch('cookie_consented');
    }
}
