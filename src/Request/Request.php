<?php

namespace AdolphYu\WalmartMarketplace\Request;

use AdolphYu\WalmartMarketplace\Exceptions\ConfigException;
use AdolphYu\WalmartMarketplace\Models\Config;
use AdolphYu\WalmartMarketplace\Models\Signature;
use AdolphYu\WalmartMarketplace\Request\Authentication\PostTokenRequest;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Mtownsend\XmlToArray\XmlToArray;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

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
    public function getAccessToken()
    {
        if (Cache::has('WALMART_MARKETPLACE_ACCESS_TOKEN' . $this->config->client_id)) {
            return Cache::get('WALMART_MARKETPLACE_ACCESS_TOKEN' . $this->config->client_id)['access_token'];
        } else {
            $postTokenRequest = new PostTokenRequest($this->config->toArray());
            $response = $postTokenRequest->send();
            return $response->json()['access_token'];
        }
    }

    /**
     * getPendingRequest
     * @return \Illuminate\Http\Client\PendingRequest
     */
    public function getPendingRequest()
    {
        if ($this->config->mode == 'dev') {
            $this->base_url = 'https://sandbox.walmartapis.com';
        }

        if ($this->config->country == 'us') {
            $headers = [
                'WM_CONSUMER.CHANNEL.TYPE' => $this->config->channel_type,
                'WM_QOS.CORRELATION_ID' => base64_encode(Str::random(16)),
                'WM_SVC.NAME' => 'Walmart Service Name',
                'Accept' => 'application/json'
            ];
            return Http::withHeaders($headers)->baseUrl($this->base_url)->withBasicAuth($this->config->client_id, $this->config->client_secret)->withHeaders([
                'WM_SEC.ACCESS_TOKEN' => $this->getAccessToken()
            ]);
        }

        if ($this->config->country == 'ca') {
            $headers = [
                'WM_SVC.NAME' => 'Walmart Gateway API',
                'WM_QOS.CORRELATION_ID' => base64_encode(Str::random(16)),
                "WM_CONSUMER.CHANNEL.TYPE" => $this->config->channel_type,
                "WM_CONSUMER.ID" => $this->config->consumer_id,
                "WM_TENANT_ID" => "WALMART.CA",
                "WM_LOCALE_ID" => "en_CA",
//                'Accept' => 'application/json'
            ];
            return Http::withHeaders($headers)->baseUrl($this->base_url)->withMiddleware(
                Middleware::mapRequest(function (RequestInterface $request) {
                    $url = $request->getUri()->getScheme() . '://' . $request->getUri()->getHost() . $request->getUri()->getPath();
                    if ($request->getUri()->getQuery()) {
                        $url = $url . '?' . $request->getUri()->getQuery();
                    }
                    $timestamp = Signature::getMilliseconds();
                    $authSignature = Signature::calculateSignature($this->config->consumer_id, $this->config->private_key, $url, $request->getMethod(), $timestamp);
                    $request = $request->withHeader('WM_SEC.TIMESTAMP', $timestamp);
                    $request = $request->withHeader('WM_SEC.AUTH_SIGNATURE', $authSignature);
//                    dd($request);
                    return $request;

                }))->withMiddleware(
                Middleware::mapResponse(function (ResponseInterface $response) {
                    return $response->withBody(\GuzzleHttp\Psr7\Utils::streamFor(json_encode(XmlToArray::convert(str_replace(["ns2:","ns3:","ns4:"], "", $response->getBody())))));
                })
            );
        }


    }

    /**
     * getAuthRequest
     * @return \Illuminate\Http\Client\PendingRequest
     */
    public function getAuthRequest()
    {
        return $this->getPendingRequest()->retry(3, 100);
    }


    /**
     * set config
     * @param $config
     * @return $this
     * @throws ConfigException
     */
    public function setConfig($config)
    {
        self::configValidation($config);
        $this->config = new Config($config);
        return $this;
    }


    public function getCountry()
    {
        $countryUrl = '';
        switch ($this->config->country) {
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

    public static function configValidation($config)
    {
//        if(empty($config['channel_type'])||empty($config['client_id'])||empty($config['client_secret'])){
//            throw new ConfigException('The channel_type or client_id or client_secret is required');
//        }

        if (isset($config['country']) && !in_array($config['country'], ['us', 'ca', 'mx'])) {
            throw new ConfigException('The country can only be us ca mx');
        }

        if (isset($config['mode']) && !in_array($config['mode'], ['dev', 'prod'])) {
            throw new ConfigException('The mode can only be dev or prod');
        }
    }


    /**
     * @param $method
     * @param $url
     * @param array $options
     * @return string
     */
    protected function getUrlString($method, $url, array $options)
    {

        if ($method == "GET") {
            $urlString = Str::of($url);
            if ($options) {
                if ($urlString->contains('?')) {
                    $urlString = $urlString . '&' . http_build_query($options);
                } else {
                    $urlString = $urlString . '?' . http_build_query($options);
                }
            }
        }
//        dd($urlString);
        return $urlString;
    }

}
