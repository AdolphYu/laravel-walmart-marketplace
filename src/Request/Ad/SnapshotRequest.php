<?php
namespace AdolphYu\WalmartMarketplace\Request\Ad;


class SnapshotRequest extends Request
{



    public function entity($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/snapshot/entity',$param);
    }

    public function status($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v1/snapshot',$param);
    }

    public function reportV2($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v2/snapshot/report',$param);
    }

    public function statusV2($param=[]){
        return  $this->getAuthRequest()
            ->get('/api/v2/snapshot',$param);
    }

    public function recommendations($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/snapshot/recommendations',$param);
    }

    public function latestReportDate($param=[]){
        return  $this->getAuthRequest()
            ->post('/api/v1/reports/latestReportDate',$param);
    }

}
