<?php

/**
 * This file is part of the laravel-dokan package.
 *
 * (c) Yassine Cheddadi <ysn.cheddadi@gmail.com>
 *
 * @package laravel-dokan
 */

namespace YassineChe\LaravelDokan;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use YassineChe\LaravelDokan\Commands\LaravelDokanCommand;

class LaravelDokanServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-dokan')
            ->hasConfigFile();
            // ->hasViews()
            // ->hasMigration('create_laravel-dokan_table')
            // ->hasCommand(LaravelDokanCommand::class);
    }


    public function packageBooted()
    {
        $this->publishes([
            __DIR__.'/../config/dokan.php' => config_path('dokan.php'),
        ], 'dokan');
    }
}
