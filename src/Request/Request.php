<?php

namespace AdolphYu\WalmartMarketplace\Request;

use AdolphYu\WalmartMarketplace\Exceptions\ConfigException;
use AdolphYu\WalmartMarketplace\Exceptions\ServiceException;
use AdolphYu\WalmartMarketplace\Models\Config;
use AdolphYu\WalmartMarketplace\Request\Authentication\PostTokenRequest;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class Request
{
    public $base_url = 'https://marketplace.walmartapis.com';

    public $config;

    public function __construct($config)
    {

        self::configValidation($config);

        $this->config = new Config($config);
    }

    public $isFetchAll = false;
    /**
     * getAccessToken
     * @return string
     */
    public function getAccessToken(){
        if(Cache::has('WALMART_MARKETPLACE_ACCESS_TOKEN'.$this->config->client_id)){
            return Cache::get('WALMART_MARKETPLACE_ACCESS_TOKEN'.$this->config->client_id)['access_token'];
        }else{
            $postTokenRequest = new PostTokenRequest($this->config->toArray());
            $response = $postTokenRequest->send();
            return $response->json()['access_token'];
        }
    }

    /**
     * getPendingRequest
     * @return \Illuminate\Http\Client\PendingRequest
     */
    public function getPendingRequest(){
        if($this->config->mode=='dev'){
            $this->base_url = 'https://sandbox.walmartapis.com';
        }

        return Http::withHeaders([
            'WM_CONSUMER.CHANNEL.TYPE' => $this->config->channel_type,
            'WM_QOS.CORRELATION_ID' => base64_encode(Str::random(16)),
            'WM_SVC.NAME'=>'Walmart Service Name',
            'Accept'=>'application/json'
        ])->baseUrl($this->base_url)->withBasicAuth($this->config->client_id, $this->config->client_secret);
    }

    /**
     * getAuthRequest
     * @return \Illuminate\Http\Client\PendingRequest
     */
    public function getAuthRequest(){
        return $this->getPendingRequest()->retry(3, 100)->withHeaders([
                'WM_SEC.ACCESS_TOKEN'=>$this->getAccessToken()
            ]);
    }


    /**
     * set config
     * @param $config
     * @return $this
     * @throws ConfigException
     */
    public function setConfig($config){
        self::configValidation($config);
        $this->config = new Config($config);
        return $this;
    }


    public function getCountry(){
        $countryUrl = '';
        switch ($this->config->country){
            case 'us':
            case 'mx':
                $countryUrl = '';
                break;
            case 'ca':
                $countryUrl = '/ca';
                break;
        }
        return $countryUrl;
    }

    public static function configValidation($config){
        if(empty($config['channel_type'])||empty($config['client_id'])||empty($config['client_secret'])){
            throw new ConfigException('The channel_type or client_id or client_secret is required');
        }

        if(isset($config['country'])&&!in_array($config['country'],['us','ca','mx'])){
            throw new ConfigException('The country can only be us ca mx');
        }

        if(isset($config['mode'])&&!in_array($config['mode'],['dev','prod'])){
            throw new ConfigException('The mode can only be dev or prod');
        }
    }


}
