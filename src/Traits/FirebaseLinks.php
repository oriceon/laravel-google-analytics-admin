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
            ->setUri($property);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.firebaseLinks/create
    */
    public function createFirebaseLink(string $property, array $params)
    {
        $this->service('CreateFirebaseLink')
            ->setUri($property)
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/properties.firebaseLinks/delete
    */
    public function deleteFirebaseLink(string $firebaseLink)
    {
        $this->service('DeleteFirebaseLink')
            ->setUri($firebaseLink);

        return $this->call();
    }

}
