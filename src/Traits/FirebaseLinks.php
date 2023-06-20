<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;


trait FirebaseLinks
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.firebaseLinks/list
    */
    public function listFirebaseLinks(string $property)
    {
        $this->service('ListFirebaseLinks')
            ->setTemplate($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.firebaseLinks/create
    */
    public function createFirebaseLink(string $property, array $params)
    {
        $this->service('CreateFirebaseLink')
            ->setTemplate($property)
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.firebaseLinks/delete
    */
    public function deleteFirebaseLink(string $firebaseLink)
    {
        $this->service('DeleteFirebaseLink');
        $this->setTemplate($firebaseLink);

        return $this->call();
    }

}
