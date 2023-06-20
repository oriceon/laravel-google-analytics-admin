<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait CustomMetrics
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customMetrics/list
    */
    public function listCustomMetrics(string $property): object
    {
        $this->service('ListCustomMetrics')
            ->setUri($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customMetrics/create
    */
    public function createCustomMetric(string $property, array $params): object
    {
        $this->service('CreateCustomMetric')
            ->setUri($property)
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customMetrics/get
    */
    public function getCustomMetric(string $property): object
    {
        $this->service('GetCustomMetric')
            ->setUri($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customMetrics/patch
    */
    public function updateCustomMetric(string $metric, array $params): object
    {
        $queryParams = implode(',', array_keys($params));

        $this->service('UpdateCustomMetric')
            ->setUri($metric)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.customMetrics/delete
    */
    public function archiveCustomMetric(string $property)
    {
        $this->service('ArchiveCustomMetric');
        $this->setUri($property);

        return $this->call();
    }

    public function getCustomMetricsResource()
    {
        $propertiesResource = include(__DIR__ . '/../resources/analytics_admin_custom_metrics.php');
        return $propertiesResource;
    }

}
