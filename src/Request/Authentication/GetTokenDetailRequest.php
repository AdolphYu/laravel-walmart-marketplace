<?php
namespace AdolphYu\WalmartMarketplace\Request\Authentication;

use AdolphYu\WalmartMarketplace\Request\Request;

class GetTokenDetailRequest extends Request
{
    public function send(){
        return $this->getAuthRequest()
            ->get('/v3/token/detail');
    }

}