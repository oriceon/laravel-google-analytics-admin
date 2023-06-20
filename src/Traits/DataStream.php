<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait DataStream
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.dataStreams/list
    */
    public function listDataStream(string $property): object
    {
        $this->service('ListDataStreams')
            ->setUri($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.dataStreams/create
    */
    public function createDataStream(string $property, array $params): object
    {
        $this->service('CreateDataStream')
            ->setUri($property)
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.dataStreams/get
    */
    public function getDataStream(string $dataStream): object
    {
        $this->service('GetDataStream')
            ->setUri($dataStream);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.dataStreams/patch
    */
    public function updateDataStream(string $dataStream, array $params): object
    {
        $queryParams = implode(',', array_keys($params));

        $this->service('UpdateDataStream')
            ->setUri($dataStream)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.dataStreams/delete
    */
    public function DeleteDataStream(string $dataStream)
    {
        $this->service('DeleteDataStream');
        $this->setUri($dataStream);

        return $this->call();
    }

    public function getDataStreamResource()
    {
        $propertiesResource = include(__DIR__ . '/../resources/analytics_admin_data_stream.php');
        return $propertiesResource;
    }

}
