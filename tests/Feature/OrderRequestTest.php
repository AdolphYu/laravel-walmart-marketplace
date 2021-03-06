<?php

namespace AdolphYu\WalmartMarketplace\Tests\Feature;


use AdolphYu\WalmartMarketplace\Request\OrderRequest;
use AdolphYu\WalmartMarketplace\Request\Orders\GetAllOrderRequest;
use AdolphYu\WalmartMarketplace\Tests\TestCase;

use Carbon\Carbon;
use Illuminate\Support\Env;


/**
 *
 * Class OrderRequestTest
 */
class OrderRequestTest extends TestCase
{

    /**
     * testSend
     */
    public function testList()
    {

        $request = new OrderRequest([
            'channel_type'=>Env::get('WM_CHANNEL_TYPE', ''),
            'client_id'=>Env::get('WM_CLIENT_ID', ''),
            'client_secret'=>Env::get('WM_CLIENT_SECRET', ''),
            'country'=>'us',
            'mode'=>'prod',
        ]);

//        dd($request->list(['limit'=>1]));

    }

    public function testOrder(){
        $request = new OrderRequest([
            'channel_type'=>Env::get('WM_CHANNEL_TYPE', ''),
            'client_id'=>Env::get('WM_CLIENT_ID', ''),
            'client_secret'=>Env::get('WM_CLIENT_SECRET', ''),
            'country'=>'us',
            'mode'=>'prod',
        ]);
//        dd($request->order('4803445924832',[]));

    }

    public function testListReleased (){
        $request = new OrderRequest([
            'channel_type'=>Env::get('WM_CHANNEL_TYPE', ''),
            'client_id'=>Env::get('WM_CLIENT_ID', ''),
            'client_secret'=>Env::get('WM_CLIENT_SECRET', ''),
            'country'=>'us',
            'mode'=>'prod',
        ]);
        dd($request->listReleased(['limit'=>'1']));
//        dd($request->listReleased(['limit'=>'100','createdStartDate'=>Carbon::now()->subMinutes(60)->toIso8601String()]));

    }




}
