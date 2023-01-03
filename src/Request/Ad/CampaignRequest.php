<?php
namespace AdolphYu\WalmartMarketplace\Request\Ad;


class CampaignRequest extends Request
{

    public function list($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/campaigns',$param);
    }


    public function create($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/campaigns',$param);
    }

    public function update($param=[]){
        return  $this->getAuthRequest()
            ->put('/api/v1/campaigns',$param);
    }

    public function delete($param=[]){
        return  $this->getAuthRequest()
            ->delete('/api/v1/campaigns',$param);
    }

}
