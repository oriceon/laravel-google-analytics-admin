<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait Properties
{


    public function ListProperties(string $account)
    {
        $this->interface('ListProperties')
            ->queryParams(['parent:'.$account]);

        return $this->call();
    }

    public function CreateProperty(array $params)
    {
        $this->interface('CreateProperty')
            ->queryBody($params);

        return $this->call();
    }

    public function GetProperty(string $property)
    {
        $this->interface('GetProperty')
            ->setTemplate($property);

        return $this->call();
    }

    public function UpdateProperty(string $property, array $params)
    {
        $queryParams = implode(',', array_keys($params));

        $this->interface('UpdateProperty')
            ->setTemplate($property)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    public function DeleteProperty(string $property)
    {
        $this->interface('DeleteProperty');
        $this->setTemplate($property);

        return $this->call();
    }

    public function getPropertyResource()
    {
        $propertiesResource = include(__DIR__ . '/../resources/analytics_admin_properties.php');
        return $propertiesResource;
    }

}
