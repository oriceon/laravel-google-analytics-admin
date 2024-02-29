<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait GoogleAdsLinks
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.googleAdsLinks/list
    */
    public function listGoogleAdsLinks(string $property): object
    {
        $this->service('ListGoogleAdsLinks')
            ->setUri($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.googleAdsLinks/create
    */
    public function createGoogleAdsLink(string $property, array $params): object
    {
        $this->service('CreateGoogleAdsLink')
            ->setUri($property)
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.googleAdsLinks/patch
    */
    public function updateGoogleAdsLink(string $googleAdsLink, array $params): object
    {
        $queryParams = implode(',', array_keys($params));

        $this->service('UpdateGoogleAdsLink')
            ->setUri($googleAdsLink)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.googleAdsLinks/delete
    */
    public function deleteGoogleAdsLink(string $googleAdsLink)
    {
        $this->service('DeleteGoogleAdsLink')
            ->setUri($googleAdsLink);

        return $this->call();
    }

}
