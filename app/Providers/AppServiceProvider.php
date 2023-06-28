<?php

namespace App\Providers;

use App\Service\TenantServcie;
use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema; // At the top of your file


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Tenants' , function ()
        {
           return new TenantServcie();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
