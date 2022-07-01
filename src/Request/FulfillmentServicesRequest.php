<?php
namespace AdolphYu\WalmartMarketplace\Request;


class FulfillmentServicesRequest extends Request
{

    public function onholdSearch($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/items/onhold/search',$param);
    }

    public function cancelInboundShipment($inboundOrderId,$param=[]){
        return  $this->getAuthRequest()
            ->delete('/v3'.$this->getCountry().'/fulfillment/inbound-shipments/'.$inboundOrderId,$param);
    }

    public function getInboundShipments($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/fulfillment/inbound-shipments',$param);

    }

    public function createInboundShipment($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/fulfillment/inbound-shipments',$param);

    }

    public function getInboundShipmentError($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/fulfillment/inbound-shipment-errors',$param);

    }

    public function getInboundShipmentItems($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/fulfillment/inbound-shipment-items',$param);

    }

    public function updateInboundShipmentQuantities($param=[]){
        return  $this->getAuthRequest()
            ->put('/v3'.$this->getCountry().'/fulfillment/shipment-quantities',$param);

    }

    public function updateInboundShipmentTracking($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/fulfillment/shipment-tracking',$param);

    }

    public function createInboundShipmentLabel($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/fulfillment/shipment-label',$param);

    }

    public function getCarrierRateQuote($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/fulfillment/carrier-rate-quotes',$param);

    }

    public function createCarrierRateQuote($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/fulfillment/carrier-rate-quotes',$param);

    }

    public function confirmCarrierRateQuote($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/fulfillment/carrier-rate-quotes/confirm',$param);

    }
    public function deleteCarrierRateQuote($id,$param=[]){
        return  $this->getAuthRequest()
            ->delete('/v3'.$this->getCountry().'/fulfillment/carrier-rate-quotes/'.$id,$param);

    }

    public function printCarrierLabel($id,$param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/fulfillment/carrier-label/'.$id,$param);

    }

    public function getWFSInventoryHealthReport($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/report/wfs/getInventoryHealthReport',$param);

    }

}