<?php
namespace AdolphYu\WalmartMarketplace\Request\Ad;


class StatRequest extends Request
{

    public function stats($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/stats',$param);
    }

}
