<?php

namespace AdolphYu\WalmartMarketplace\Tests\Feature;


use AdolphYu\WalmartMarketplace\Request\FeedRequest;
use AdolphYu\WalmartMarketplace\Request\OrderRequest;
use AdolphYu\WalmartMarketplace\Request\Orders\GetAllOrderRequest;
use AdolphYu\WalmartMarketplace\Tests\TestCase;
use Carbon\Carbon;
use Illuminate\Support\Env;


/**
 *
 * Class FeedRequestTest
 */
class FeedRequestTest extends TestCase
{

    /**
     * testList
     */
    public function testList()
    {
        $request = new FeedRequest([
            'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
            'client_id' => Env::get('WM_CLIENT_ID', ''),
            'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
        ]);
        $request->isFetchAll= true;
    }

    /**
     * testInfo
     */
    public function testInfo()
    {
        $request = new FeedRequest([
            'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
            'client_id' => Env::get('WM_CLIENT_ID', ''),
            'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
        ]);
        dd($request->info('D7C19C6DBA0B48B389CC9D9AB2EB49F4@AREBAQA',[])->json());
    }




}
