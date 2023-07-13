<?php

namespace App\Providers;

use App\Interfaces\CityListInterface;
use App\Services\FakeCityService;
use App\Services\RealCityService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isProduction()) {
            $this->app->singleton(CityListInterface::class, RealCityService::class);
        } else {
            $this->app->singleton(CityListInterface::class, FakeCityService::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
