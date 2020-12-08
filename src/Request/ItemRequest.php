<?php
namespace AdolphYu\WalmartMarketplace\Request;


use Illuminate\Support\Collection;

/**
 * Class ItemRequest
 * @package AdolphYu\WalmartMarketplace\Request
 * @doc https://developer.walmart.com/api/us/mp/items#tag/Items
 */
class ItemRequest extends Request
{
    /**
     * taxonomy
     * @param $id
     * @param $param
     * @return \Illuminate\Http\Client\Response
     */
    public function taxonomy($param){
        return $this->getAuthRequest()
            ->get('/v3/items/taxonomy',$param);

    }

    /**
     * itemCount
     * @param $param
     * @return \Illuminate\Http\Client\Response
     */
    public function count($param){
        return $this->getAuthRequest()
            ->get('/v3/items/count',$param);

    }

    /**
     * info
     * @param $param
     * @return \Illuminate\Http\Client\Response
     */
    public function info($id,$param){
        return $this->getAuthRequest()
            ->get('/v3/items/'.$id,$param);

    }

    /**
     * search
     * @param $param
     * @return \Illuminate\Http\Client\Response
     */
    public function search($param){
        return $this->getAuthRequest()
            ->get('/v3/items/walmart/search',$param);

    }


    /**
     * search
     * @param $param
     * @return Collection
     */
    public function list($param){
        $objects = collect();
        while(true){
            $response = $this->getAuthRequest()
                ->get('/v3/items',$param);
            $result = $response->json();

            if(isset($result['ItemResponse'])){
                foreach ($result['ItemResponse'] as $object){
                    $objects->push($object);
                }
            }

            if(isset($result['nextCursor'])){
                $param = array_merge($param,[
                    'nextCursor'=>$result['nextCursor']
                ]);
            }else{
                break;
            }

            if($this->isFetchAll===false){
                break;
            }
        }
        return $objects;


//        return $this->getAuthRequest()
//            ->get('/v3/items',$param);

    }



}