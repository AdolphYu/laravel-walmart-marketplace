<?php

namespace AdolphYu\WalmartMarketplace\Request;


class InventoryRequest extends Request
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function inventories($param=[])
    {
        return $this->getAuthRequest()
            ->get('/v3' . $this->getCountry() . '/inventories', $param);
    }
    public function showInventories($sku,$param=[])
    {
        return $this->getAuthRequest()
            ->get('/v3' . $this->getCountry() . '/inventories/'.$sku, $param);
    }

    public function updateInventories($sku,$param=[])
    {
        return $this->getAuthRequest()
            ->put('/v3' . $this->getCountry() . '/inventories/'.$sku, $param);
    }

    public function wfsInventory($param=[])
    {
        return $this->getAuthRequest()
            ->get('/v3' . $this->getCountry() . '/fulfillment/inventory', $param);
    }

    public function inventory($param=[])
    {
        return $this->getAuthRequest()
            ->get('/v3' . $this->getCountry() . '/inventory', $param);
    }

    public function updateInventory($param=[])
    {
        return $this->getAuthRequest()
            ->put('/v3' . $this->getCountry() . '/inventory',$param);
    }


}