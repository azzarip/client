<?php

namespace Azzarip\Client;

use Livewire\Livewire;
use Azzarip\Client\Theme\Theme;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Spatie\LaravelPackageTools\Package;
use Azzarip\Client\CookieConsent\ConsentManager;
use Illuminate\Cookie\Middleware\EncryptCookies;
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
            ->hasConfigFile(configFileName: 'domains')
            ->hasConfigFile(configFileName: 'client')
            ->hasRoutes('routes')
            ->hasViews()
            ->hasCommands(commandClassNames: $this->getCommands());
    }

    public function registeringPackage(): void
    {
        Config::set('app-modules.modules_namespace', 'Domains');
        Config::set('app-modules.modules_directory', 'domains');
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
