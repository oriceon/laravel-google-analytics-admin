<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait ConversionEvents
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.conversionEvents/list
    */
    public function listConversionEvents(string $property)
    {
        $this->service('ListConversionEvents')
            ->setUri($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.conversionEvents/create
    */
    public function createConversionEvent(string $property, array $params)
    {
        $this->service('CreateConversionEvent')
            ->setUri($property)
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.conversionEvents/get
    */
    public function getConversionEvent(string $property)
    {
        $this->service('GetConversionEvent')
            ->setUri($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.conversionEvents/delete
    */
    public function deleteConversionEvent(string $property)
    {
        $this->service('DeleteConversionEvent')
            ->setUri($property);

        return $this->call();
    }

}
