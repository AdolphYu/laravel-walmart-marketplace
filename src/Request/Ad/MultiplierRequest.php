<?php
namespace AdolphYu\WalmartMarketplace\Request\Ad;


class MultiplierRequest extends Request
{

    public function list($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/multipliers/placement',$param);
    }


    public function create($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/multipliers/placement',$param);
    }

    public function update($param=[]){
        return  $this->getAuthRequest()
            ->put('/api/v1/multipliers/placement',$param);
    }

    public function platformList($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/multipliers/platform',$param);
    }

    public function platformCreate($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/multipliers/platform',$param);
    }

    public function platformUpdate($param=[]){
        return  $this->getAuthRequest()
            ->put('/api/v1/multipliers/platform',$param);
    }



}
