<?php
namespace AdolphYu\WalmartMarketplace\Request\Ad;


class ApiUsageRequest extends Request
{

    public function analyze($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/api_usage_analyze',$param);
    }

}
