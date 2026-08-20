<?php

namespace App\Providers;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Notification::extend('whatsapp', function () {
            return new \App\Notifications\Channels\WhatsAppChannel();
        });

        // Shared hosting terminates TLS ahead of PHP, so generated URLs can come back
        // as http:// and trip mixed-content warnings. Pin the scheme in production.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
