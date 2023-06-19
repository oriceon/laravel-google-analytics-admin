<?php

namespace Tda\LaravelNetcup;

use Illuminate\Support\ServiceProvider;

class GoogleAnalyticsAdminServiceProvider extends ServiceProvider
{
    public function registeringPackage()
    {
        $this->app->alias(Netcup::class, 'laravel-google-analytics-admin');

    }
}
