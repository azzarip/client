<?php

namespace Azzarip\Client;

use Illuminate\Support\Facades\Config;
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
            ->hasConfigFile(configFileName: 'domains')
            ->hasConfigFile(configFileName: 'client')
            ->hasViews()
            ->hasRoutes('routes');
    }

    public function registeringPackage(): void
    {
        Config::set('app-modules.modules_namespace', 'Domains');
        Config::set('app-modules.modules_directory', 'domains');
    }
}
