<?php
namespace AdolphYu\WalmartMarketplace\Request;


class FeedRequest extends Request
{
    public function list($param){


        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/feeds',$param);
        $objects = collect();
        while(true){

            $result = $response->json();
            if(isset($result['results']['feed'])){
                foreach ($result['results']['feed'] as $object){
                    $objects->push($object);
                }
            }

            if($result['offset']+$result['limit']>=$result['totalResults']){
                break;
            }

            if($this->isFetchAll===false){
                break;
            }

            if(isset($result['limit'])){
                $param = array_merge($param,[
                    'offset'=>$result['offset']+$result['limit']
                ]);
            }

            if($this->config->mode=='dev'){
                break;
            }
        }
        return $objects;
    }

    /**
     * FEED INFO
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     * @TODO itemDetails NOT PROCESS
     */
    public function info($id,$param){

        return $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/feeds/'.$id,$param);

    }



}