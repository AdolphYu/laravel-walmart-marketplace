<?php
namespace AdolphYu\WalmartMarketplace\Request;


class NotificationsRequest extends Request
{
    public function eventTypes($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/webhooks/eventTypes',$param);

    }
    public function testNotification($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/webhooks/test',$param);
    }


    public function allSubscriptions($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/webhooks/subscriptions',$param);
    }


    public function createSubscription($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/webhooks/subscriptions',$param);
    }

    public function updateSubscription($id,$param=[]){
        return  $this->getAuthRequest()
            ->patch('/v3'.$this->getCountry().'/webhooks/subscriptions/'.$id,$param);
    }

    public function deleteSubscription($id,$param=[]){
        return  $this->getAuthRequest()
            ->delete('/v3'.$this->getCountry().'/webhooks/subscriptions/'.$id,$param);
    }

}