<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait DataStream
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.dataStreams/list
    */
    public function listDataStream(string $property)
    {
        $this->service('ListDataStreams')
            ->setTemplate($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.dataStreams/create
    */
    public function createDataStream(string $property, array $params)
    {
        $this->service('CreateDataStream')
            ->setTemplate($property)
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.dataStreams/get
    */
    public function getDataStream(string $dataStream)
    {
        $this->service('GetDataStream')
            ->setTemplate($dataStream);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.dataStreams/patch
    */
    public function updateDataStream(string $dataStream, array $params)
    {
        $queryParams = implode(',', array_keys($params));

        $this->service('UpdateDataStream')
            ->setTemplate($dataStream)
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
        $this->setTemplate($dataStream);

        return $this->call();
    }

}
