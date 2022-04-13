<?php
namespace AdolphYu\WalmartMarketplace\Request;


class UtilitiesRequest extends Request
{
    public function taxonomy($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/utilities/taxonomy',$param);

    }

    public function departments($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/utilities/taxonomy/departments',$param);
    }


    public function categories($id,$param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/utilities/taxonomy/departments/'.$id,$param);
    }

    public function apiStatus($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/utilities/apiStatus',$param);
    }

}