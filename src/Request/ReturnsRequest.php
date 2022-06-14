<?php
namespace AdolphYu\WalmartMarketplace\Request;


class ReturnsRequest extends Request
{
    public function __construct($config)
    {
        parent::__construct($config);
    }


    public function returns($param){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/returns',$param);
    }



}