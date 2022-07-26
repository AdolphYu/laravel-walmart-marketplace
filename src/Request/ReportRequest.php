<?php

namespace AdolphYu\WalmartMarketplace\Request;


class ReportRequest extends Request
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function getReport($param)
    {
        return $this->getAuthRequest()
            ->get('/v3/getReport', $param);
    }


    public function availableReconReportDates($param)
    {
        return $this->getAuthRequest()
            ->get('/v3/' . $this->getCountry() . 'report/reconreport/availableReconFiles', $param);
    }

    public function reconReport($param)
    {
        return $this->getAuthRequest()
            ->get('/v3' . $this->getCountry() . '/report/reconreport/reconFile', $param);
    }


}