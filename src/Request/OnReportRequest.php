<?php

namespace AdolphYu\WalmartMarketplace\Request;


class OnReportRequest extends Request
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function all($param)
    {
        return $this->getAuthRequest()
            ->get('/v3' . $this->getCountry() . '/reports/reportRequests', $param);
    }
    public function create($reportType,$reportVersion,$param=[])
    {
        return $this->getAuthRequest()
            ->post('/v3' . $this->getCountry() . '/reports/reportRequests?reportType='.$reportType.'&reportVersion='.$reportVersion, $param);
    }

    public function status($id,$param=[])
    {
        return $this->getAuthRequest()
            ->get('/v3' . $this->getCountry() . '/reports/reportRequests/'.$id, $param);
    }

    public function download($param)
    {
        return $this->getAuthRequest()
            ->get('/v3' . $this->getCountry() . '/reports/downloadReport', $param);
    }




}