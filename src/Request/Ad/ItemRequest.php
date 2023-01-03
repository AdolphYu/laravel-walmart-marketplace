<?php
namespace AdolphYu\WalmartMarketplace\Request\Ad;


class ItemRequest extends Request
{

    public function list($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/adItems',$param);
    }


    public function create($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/adItems',$param);
    }

    public function update($param=[]){
        return  $this->getAuthRequest()
            ->put('/api/v1/adItems',$param);
    }



}
