<?php

namespace App\Providers;

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
        $servicesPath = "App\Services";
        $contractsPath = "App\Contracts";

        $this->app->bind("{$contractsPath}\TrendingInterface",          "{$servicesPath}\TrendingService");
        $this->app->bind("{$contractsPath}\HandleResponseInterface",    "{$servicesPath}\HandleResponseService");
        $this->app->bind("{$contractsPath}\GenresInterface",            "{$servicesPath}\GenresService");
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
