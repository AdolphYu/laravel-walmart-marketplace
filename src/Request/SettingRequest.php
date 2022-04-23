<?php
namespace AdolphYu\WalmartMarketplace\Request;


class SettingRequest extends Request
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function partnerProfile($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/settings/partnerprofile',$param);
    }

    public function shippingProfile($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/settings/shippingprofile',$param);
    }

    public function activationStatus($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/settings/shipping/templates/activationStatus',$param);
    }

    public function shipNodes($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/settings/shipping/shipnodes',$param);
    }


    public function createShipNode($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/settings/shipping/shipnodes',$param);
    }

    public function updateShipNode($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/settings/shipping/shipnodes',$param);
    }

    public function shipTemplates($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/settings/shipping/templates',$param);
    }

    public function ThirdPLShipNodes($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/settings/shipping/3plproviders',$param);
    }

    public function shipNodesCoverage($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/settings/shipping/shipnodes/coverage',$param);
    }

    public function createThirdPL($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/settings/shipping/3plshipnodes',$param);
    }

    public function carriers($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/settings/shipping/carriers',$param);
    }

    public function createShippingTemplates($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/settings/shipping/templates',$param);
    }

    public function shippingTemplatesDetail($id,$param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/settings/shipping/templates/'.$id,$param);
    }

    public function updateShippingTemplates($id,$param=[]){
        return  $this->getAuthRequest()
            ->put('/v3'.$this->getCountry().'/settings/shipping/templates/'.$id,$param);
    }

    public function deleteShippingTemplates($id,$param=[]){
        return  $this->getAuthRequest()
            ->delete('/v3'.$this->getCountry().'/settings/shipping/templates/'.$id,$param);
    }


}