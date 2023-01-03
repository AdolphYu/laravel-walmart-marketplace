<?php
namespace AdolphYu\WalmartMarketplace\Request\Ad;


class ItemSearchRequest extends Request
{

    public function list($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/itemSearch',$param);
    }

}

