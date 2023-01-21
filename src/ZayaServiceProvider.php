<?php

namespace Farshadff\Zaya;

use Illuminate\Support\ServiceProvider;

class ZayaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'zaya');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'zaya');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('zaya.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/zaya'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/zaya'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/zaya'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'zaya');

        // Register the main class to use with the facade
        $this->app->singleton('zaya', function () {
            return new Zaya;
        });
        // Register the main class to use with the facade
        $this->app->singleton('zayalink', function () {
            return new ZayaLink;
        });
        // Register the main class to use with the facade
        $this->app->singleton('zayaspace', function () {
            return new ZayaSpace;
        });
        // Register the main class to use with the facade
        $this->app->singleton('zayadomain', function () {
            return new ZayaDomain;
        });
        // Register the main class to use with the facade
        $this->app->singleton('zayaaccount', function () {
            return new ZayaAccount;
        });
    }
}
