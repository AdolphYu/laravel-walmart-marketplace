<?php
namespace AdolphYu\WalmartMarketplace\Request;


class OrderRequest extends Request
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function list($param){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/orders',$param);
    }

    public function order($id,$param){
        $response = $this->getAuthRequest()
            ->get('/v3/'.$this->getCountry().'orders/'.$id,$param);
        return $response['order'];
    }

    public function listReleased($param){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/orders/released',$param);
    }

    public function commonList($url,$param,$payload){

        $objects = collect();
        while(true){
            $response = $this->getAuthRequest()
                ->get($url,$param);
            $result = $response->json();
            if(isset($result['list']['meta']['nextCursor'])){
                $parseUrl = parse_url($result['list']['meta']['nextCursor']);
                if($parseUrl['query']){
                    parse_str($parseUrl['query'],$param);
                }
            }

            if(isset($result['list']['elements'][$payload])){
                foreach ($result['list']['elements'][$payload] as $object){
                    $objects->push($object);
                }
            }

            if($this->isFetchAll===false){
                break;
            }

            if(empty($result['list']['meta']['nextCursor'])){
                break;
            }

            if($this->config->mode=='dev'){
                break;
            }


        }
        return $objects;
    }


}