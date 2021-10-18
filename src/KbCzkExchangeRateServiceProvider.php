<?php

namespace Bestfitcz\KbCzkExchangeRate;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class KbCzkExchangeRateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'kb-czk-exchange-rate');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'kb-czk-exchange-rate');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/kb-czk-exchange-rate.php' => config_path('kb-czk-exchange-rate.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/kb-czk-exchange-rate'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/kb-czk-exchange-rate'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/kb-czk-exchange-rate'),
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
        $this->mergeConfigFrom(__DIR__ . '/../config/kb-czk-exchange-rate.php', 'kb-czk-exchange-rate');

        // Register the main class to use with the facade
        $this->app->singleton('kb-czk-exchange-rate', function () {
            return new KbCzkExchangeRate;
        });
    }
}
