<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait CustomDimensions
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customDimensions/list
    */
    public function listCustomDimensions(string $property)
    {
        $this->service('ListCustomDimensions')
            ->setUri($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customDimensions/create
    */
    public function createCustomDimension(string $property, array $params)
    {
        $this->service('CreateCustomDimension')
            ->setUri($property)
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customDimensions/get
    */
    public function getCustomDimension(string $dimension)
    {
        $this->service('GetCustomDimension')
            ->setUri($dimension);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customDimensions/patch
    */
    public function updateCustomDimension(string $dimension, array $params)
    {
        $queryParams = implode(',', array_keys($params));

        $this->service('UpdateCustomDimension')
            ->setUri($dimension)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customDimensions/archive
    */
    public function archiveCustomDimension(string $dimension)
    {
        $this->service('ArchiveCustomDimension');
        $this->setUri($dimension);

        return $this->call();
    }

}
