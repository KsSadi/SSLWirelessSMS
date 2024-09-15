<?php

namespace KsSadi\SSLWirelessSMS;

use Illuminate\Support\ServiceProvider;

class SSLWirelessSMSServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge the package config file with the application's published config
        $this->mergeConfigFrom(__DIR__ . '/../config/sslwireless.php', 'sslwireless');

        // Register the singleton instance of the client with the IoC container
        $this->app->singleton('sslwireless', function ($app) {
            return new SslWirelessSMSClient();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the config file to the application's config directory
        $this->publishes([
            __DIR__ . '/../config/sslwireless.php' => config_path('sslwireless.php'),
        ], 'config');

        // Optionally, you could add any boot logic here, e.g., custom routes, etc.
    }

}
