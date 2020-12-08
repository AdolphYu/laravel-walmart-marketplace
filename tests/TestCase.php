<?php

namespace AdolphYu\WalmartMarketplace\Tests;

use AdolphYu\WalmartMarketplace\PackageServiceProvider;
use AdolphYu\WalmartMarketplace\Providers\WalmartMarketplaceServiceProvider;


class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
//        dd($this->app->environmentFilePath());
//        dd($this);
////        dd(realpath(__DIR__.'/../'));
//        $this->app->useEnvironmentPath(realpath(__DIR__.'/../'));
        // additional setup
    }

    protected function getPackageProviders($app)
    {
//        dd($app->get('config'));
        return [
            PackageServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}