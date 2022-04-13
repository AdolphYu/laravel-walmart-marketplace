<?php
namespace AdolphYu\WalmartMarketplace\Request;


class InsightsRequest extends Request
{
    public function topTrending($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/insights/items/trending',$param);

    }


}