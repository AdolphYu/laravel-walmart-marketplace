<?php
namespace AdolphYu\WalmartMarketplace\Request\Ad;


class KeywordRequest extends Request
{

    public function suggestions($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/keyword_suggestions',$param);
    }

    public function list($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/keywords',$param);
    }

    public function create($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/keywords',$param);
    }

    public function update($param=[]){
        return  $this->getAuthRequest()
            ->put('/api/v1/keywords',$param);
    }

    public function analytics($param=[]){
        return  $this->getAuthRequest()
            ->put('/api/v1/keywordAnalytics',$param);
    }




}
