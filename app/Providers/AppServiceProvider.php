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
        $this->app->bind("{$contractsPath}\MovieInterface",             "{$servicesPath}\MovieService");
        $this->app->bind("{$contractsPath}\SearchInterface",            "{$servicesPath}\SearchService");
        $this->app->bind("{$contractsPath}\DiscoverInterface",          "{$servicesPath}\DiscoverService");
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
