<?php

namespace AdolphYu\WalmartMarketplace\Tests;

use AdolphYu\WalmartMarketplace\PackageServiceProvider;
use AdolphYu\WalmartMarketplace\Providers\WalmartMarketplaceServiceProvider;
use Illuminate\Support\Env;


class TestCase extends \Orchestra\Testbench\TestCase
{
    public $config;

    public function setUp(): void
    {
        parent::setUp();
//        dd($this->app->environmentFilePath());
//        dd($this);
////        dd(realpath(__DIR__.'/../'));
//        $this->app->useEnvironmentPath(realpath(__DIR__.'/../'));
        // additional setup
        $this->config = [
            'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
            'client_id' => Env::get('WM_CLIENT_ID', ''),
            'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
            'country'=>'us',
            'mode'=>'prod',
        ];
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