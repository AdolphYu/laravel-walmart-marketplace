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
     * @param array $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function taxonomy($param=[]){
        return $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/items/taxonomy',$param);

    }

    /**
     * @param array $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function count($param=[]){
        return $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/items/count',$param);

    }

    /**
     * @param $id
     * @param array $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function info($id,$param=[]){
        return $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/items/'.$id,$param);

    }

    /**
     * @param $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function search($param=[]){
        return $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/items/walmart/search',$param);

    }


    /**
     *
     * @param $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response|mixed
     */
    public function list($param=[]){
        $objects = collect();

        return $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/items',$param);

//        while(true){
//            $response = $this->getAuthRequest()
//                ->get('/v3'.$this->getCountry().'/items',$param);
//            $result = $response->json();
//
//            if(isset($result['ItemResponse'])){
//                foreach ($result['ItemResponse'] as $object){
//                    $objects->push($object);
//                }
//            }
//
//            if(isset($result['nextCursor'])){
//                $param = array_merge($param,[
//                    'nextCursor'=>$result['nextCursor']
//                ]);
//            }else{
//                break;
//            }
//
//            if($this->isFetchAll===false){
//                break;
//            }
//        }
//        return $objects;


//        return $this->getAuthRequest()
//            ->get('/v3/items',$param);

    }


    /**
     * @param $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function associations($param=[]){
        return $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/items/associations',$param);
    }


    /**
     * catalog search
     * @param array $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function catalogSearch($param = []){
        return $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/items/catalog/search',$param);
    }

    /**
     * Get item count by groups
     * @param array $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function groupsCount($param = []){
        return $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/items/groups/count',$param);
    }

    /**
     * @param $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function bulkItemSetup($type,$param){
//        dd($param);
        return $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/feeds?feedType='.$type,$param);
    }

    /**
     * price
     * @param array $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function price($param = []){
        return $this->getAuthRequest()
            ->put('/v3'.$this->getCountry().'/price',$param);
    }


    /**
     * promotionalPrice
     * @param array $param
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function promotionalPrice($id){
        return $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/promo/sku/'.$id);
    }

}