<?php

namespace Azzarip\Client;

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
}
