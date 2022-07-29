<?php
namespace AdolphYu\WalmartMarketplace\Request;


use Carbon\Carbon;

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

    /**
     * @param array $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function apiStatus($param=[]){
//        dd($this->getCountry());
        //ca 用order代替
        if ($this->config->country=='ca'){
            $param = ['limit'=>1];
            return  $this->getAuthRequest()
                ->get('/v3'.$this->getCountry().'/items',$param);
        }else{
            return  $this->getAuthRequest()
                ->get('/v3'.$this->getCountry().'/utilities/apiStatus',$param);
        }

    }

}