<?php

namespace AdolphYu\WalmartMarketplace\Tests\Feature;


use AdolphYu\WalmartMarketplace\Request\FeedRequest;
use AdolphYu\WalmartMarketplace\Request\ItemRequest;
use AdolphYu\WalmartMarketplace\Request\OrderRequest;
use AdolphYu\WalmartMarketplace\Request\Orders\GetAllOrderRequest;
use AdolphYu\WalmartMarketplace\Tests\TestCase;
use Carbon\Carbon;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Env;


/**
 *
 * Class ItemRequestTest
 */
class ItemRequestTest extends TestCase
{

    /**
     * testList
     */
    public function testTaxonomy()
    {
        $request = new ItemRequest();
        $request->isFetchAll = true;
        $request->setConfig([
            'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
            'client_id' => Env::get('WM_CLIENT_ID', ''),
            'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
        ]);
//        dd($request->taxonomy([])->json());
    }

    /**
     * testCount
     */
    public function testCount()
    {
        try {
            $request = new ItemRequest();
            $request->isFetchAll = true;
            $request->setConfig([
                'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
                'client_id' => Env::get('WM_CLIENT_ID', ''),
                'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
            ]);
//            dd($request->count(['status'=>'PUBLISHED'])->json());;
        } catch (\Illuminate\Http\Client\RequestException $e) {
            dd($e->response->json());
        }

    }

    /**
     * testSearch
     */
    public function testInfo()
    {
        try {
            $request = new ItemRequest();
            $request->isFetchAll = true;
            $request->setConfig([
                'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
                'client_id' => Env::get('WM_CLIENT_ID', ''),
                'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
            ]);
//            dd($request->info('432541287',['productIdType'=>'ITEM_ID'])->json());;
        } catch (\Illuminate\Http\Client\RequestException $e) {
            dd($e->response->json());
        }

    }

    /**
     * testSearch
     */
    public function testSearch()
    {
        try {
            $request = new ItemRequest([
                'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
                'client_id' => Env::get('WM_CLIENT_ID', ''),
                'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
            ]);
            $request->isFetchAll = true;
//            dd($request->search(['upc'=>'','query'=>'ipad','gtin'=>''])->json());;
        } catch (\Illuminate\Http\Client\RequestException $e) {
            dd($e->response->json());
        }

    }

    /**
     * testList
     */
    public function testList()
    {
        try {
            $request = new ItemRequest([
                'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
                'client_id' => Env::get('WM_CLIENT_ID', ''),
                'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
            ]);
//            $request->isFetchAll = true;
            dd($request->list(['limit'=>1])->first());;
        } catch (\Illuminate\Http\Client\RequestException $e) {
            dd($e->response->json());
        }

    }


}
