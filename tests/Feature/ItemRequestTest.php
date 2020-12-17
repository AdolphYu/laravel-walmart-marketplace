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
        $request = new ItemRequest([
            'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
            'client_id' => Env::get('WM_CLIENT_ID', ''),
            'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
            'country'=>'us',
            'mode'=>'prod',
        ]);
//        $request->isFetchAll = true;
//        $request->setConfig();
//        dd($request->taxonomy([]));
    }

    /**
     * testCount
     */
    public function testCount()
    {
        try {
            $request = new ItemRequest([
                'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
                'client_id' => Env::get('WM_CLIENT_ID', ''),
                'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
                'country'=>'us',
                'mode'=>'prod',
            ]);
//            $request->isFetchAll = true;
//            dd($request->count(['status'=>'PUBLISHED']));;
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
            $request = new ItemRequest([
                'channel_type' => Env::get('WM_CHANNEL_TYPE', ''),
                'client_id' => Env::get('WM_CLIENT_ID', ''),
                'client_secret' => Env::get('WM_CLIENT_SECRET', ''),
                'country'=>'us',
                'mode'=>'prod',
            ]);
//            $request->isFetchAll = true;
//            dd($request->info('42V1547UAAJR0'));
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
            $request = new ItemRequest($this->config);
            $request->isFetchAll = true;
//            dd($request->search(['upc'=>'','query'=>'ipad','gtin'=>'']));;
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
            $request = new ItemRequest($this->config);
//            $request->isFetchAll = true;
            dd($request->list(['limit'=>1]));;
        } catch (\Illuminate\Http\Client\RequestException $e) {
            dd($e->response->json());
        }

    }


}
