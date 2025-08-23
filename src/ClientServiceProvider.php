<?php

namespace Azzarip\Client;

use Azzarip\Client\CookieConsent\ConsentManager;
use Azzarip\Client\Theme\Theme;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('azzarip')
            ->hasConfigFile('client')
            ->hasRoutes('routes')
            ->hasViews()
            ->hasTranslations()
            ->hasCommands($this->getCommands());
    }

    public function bootingPackage()
    {
        EncryptCookies::except('cookie_consent');
        Blade::component('theme', alias: Theme::class);
        Livewire::component('cookie-consent', ConsentManager::class);
    }

    protected function getCommands(): array
    {
        return [
            \Azzarip\Client\Commands\GenerateSitemap::class,
        ];
    }
}
