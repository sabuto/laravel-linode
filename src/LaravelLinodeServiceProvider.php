<?php

namespace Sabuto\LaravelLinode;

use Sabuto\LaravelLinode\Commands\LaravelLinodeCommand;
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
            ->hasRoutes(__DIR__ . '../routes/web.php')
            ->hasCommand(LaravelLinodeCommand::class);
    }
}
