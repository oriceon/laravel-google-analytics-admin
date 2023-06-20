<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait GoogleAdsLinks
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.googleAdsLinks/list
    */
    public function listGoogleAdsLinks(string $property)
    {
        $this->service('ListGoogleAdsLinks')
            ->setTemplate($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.googleAdsLinks/create
    */
    public function createGoogleAdsLink(string $property, array $params)
    {
        $this->service('CreateGoogleAdsLink')
            ->setTemplate($property)
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.googleAdsLinks/patch
    */
    public function updateGoogleAdsLink(string $googleAdsLink, array $params)
    {
        $queryParams = implode(',', array_keys($params));

        $this->service('UpdateGoogleAdsLink')
            ->setTemplate($googleAdsLink)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.googleAdsLinks/delete
    */
    public function deleteGoogleAdsLink(string $googleAdsLink)
    {
        $this->service('DeleteGoogleAdsLink');
        $this->setTemplate($googleAdsLink);

        return $this->call();
    }

}
