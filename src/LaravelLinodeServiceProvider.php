<?php

namespace Sabuto\LaravelLinode;

use Sabuto\LaravelLinode\Commands\LaravelLinodeCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelLinodeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-linode')
            ->hasConfigFile()
            ->hasRoute('web')
            ->hasMigration('create_linode_keys_table')
            ->hasCommand(LaravelLinodeCommand::class)
            ->runsMigrations();
    }
}
