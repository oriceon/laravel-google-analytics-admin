<?php

namespace Tda\LaravelGoogleAnalyticsAdmin;

use Illuminate\Support\ServiceProvider;

class GoogleAnalyticsAdminServiceProvider extends ServiceProvider
{
    public function registeringPackage()
    {
        $this->app->alias(GoogleAnalyticsAdmin::class, 'laravel-google-analytics-admin');

    }
}
