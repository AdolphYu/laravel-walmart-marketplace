<?php

namespace AdolphYu\WalmartMarketplace;


use AdolphYu\WalmartMarketplace\FBMSG;
use AdolphYu\WalmartMarketplace\Providers\WalmartMarketplaceServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

/**
 * Class PackageServiceProvider
 */
class PackageServiceProvider extends ServiceProvider
{


    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/walmart-marketplace.php' => config_path('walmart-marketplace.php'),
            ], 'config');
        }

        $this->registerRoutes();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/walmart-marketplace.php', 'walmart-marketplace-api');
    }

}
