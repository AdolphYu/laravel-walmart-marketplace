<?php
namespace AdolphYu\WalmartMarketplace\Request\Authentication;

use AdolphYu\WalmartMarketplace\Request\Request;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Validation\UnauthorizedException;
use AdolphYu\WalmartMarketplace\Exceptions\ServiceException;
use Illuminate\Support\Facades\Cache;

class PostTokenRequest extends Request
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function send(){
        $response =  $this->getPendingRequest()->asForm()->post('/v3/token',['grant_type'=>'client_credentials']);

        if(!$response->successful()){
            throw new ServiceException($response->body(),$response->status());
        }

        Cache::put('WALMART_MARKETPLACE_ACCESS_TOKEN'.$this->config->client_id,$response->json(),800);
        return $response;

    }



}