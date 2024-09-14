<?php

namespace Azzarip\Client;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Azzarip\Client\Commands\ClientCommand;

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
            ->name('client')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_client_table')
            ->hasCommand(ClientCommand::class);
    }
}
