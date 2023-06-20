<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait Properties
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties/list
    */
    public function listProperties(string $account)
    {
        $this->service('ListProperties')
            ->queryParams(['parent:'.$account]);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties/create
    */
    public function createProperty(array $params)
    {
        $this->service('CreateProperty')
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties/get
    */
    public function getProperty(string $property)
    {
        $this->service('GetProperty')
            ->setTemplate($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties/patch
    */
    public function updateProperty(string $property, array $params)
    {
        $queryParams = implode(',', array_keys($params));

        $this->service('UpdateProperty')
            ->setTemplate($property)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties/delete
    */
    public function deleteProperty(string $property)
    {
        $this->service('DeleteProperty');
        $this->setTemplate($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties/runAccessReport
    */
    public function runPropertiesAccessReport(string $property, array $dateRange)
    {
        $accessDateRange = json_encode($dateRange);
        $this->service('RunAccessReport')->setTemplate($property);
        $this->queryParams($dateRange);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties/getDataRetentionSettings
    */
    public function getDataRetentionSettings(string $property)
    {
        $this->service('GetDataRetentionSettings')->setTemplate($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties/updateDataRetentionSettings
    */
    public function updateDataRetentionSettings(string $property, array $params)
    {
        $queryParams = implode(',', array_keys($params));

        $this->service('UpdateDataRetentionSettings')
            ->setTemplate($property)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties/acknowledgeUserDataCollection
    */
    public function acknowledgeUserDataCollection(string $property)
    {
        $this->service('UpdateDataRetentionSettings')->setTemplate($property);

        return $this->call();
    }

    public function getPropertyResource()
    {
        $propertiesResource = include(__DIR__ . '/../resources/analytics_admin_properties.php');
        return $propertiesResource;
    }

}
