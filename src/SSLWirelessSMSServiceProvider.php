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
        $this->mergeConfigFrom(__DIR__ . '/../config/sslwireless.php', 'sslwireless');

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
        $this->publishes([
            __DIR__ . '/../config/sslwireless.php' => config_path('sslwireless.php'),
        ], 'config');
    }
}
