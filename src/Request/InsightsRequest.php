<?php
namespace AdolphYu\WalmartMarketplace\Request;


class InsightsRequest extends Request
{
    public function topTrending($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/insights/items/trending',$param);

    }
    public function unpublishedItemCounts($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/insights/items/unpublished/counts',$param);
    }

    public function unpublishedItems($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/insights/items/unpublished/items',$param);
    }

    public function sellerListingQualityScore($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/insights/items/listingQuality/score',$param);
    }

    public function itemListingQualityDetails($param=[]){
        return  $this->getAuthRequest()
            ->post('/v3'.$this->getCountry().'/insights/items/listingQuality/items',$param);
    }

    public function itemCountWithListingQualityIssues($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/insights/items/listingQuality/count',$param);
    }
    public function proSellerBadgeStatus($param=[]){
        return  $this->getAuthRequest()
            ->get('/v3'.$this->getCountry().'/insights/prosellerbadge',$param);
    }






}