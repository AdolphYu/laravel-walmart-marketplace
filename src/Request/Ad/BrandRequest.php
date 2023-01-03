<?php
namespace AdolphYu\WalmartMarketplace\Request\Ad;


class BrandRequest extends Request
{


    public function list($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/sba_profile',$param);
    }

    public function create($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/sba_profile',$param);
    }

    public function update($param=[]){
        return  $this->getAuthRequest()
            ->put('/api/v1/sba_profile',$param);
    }

    public function image_upload($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/sba_profile_image_upload',$param);
    }



}
