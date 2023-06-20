<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Traits;

trait Accounts
{


    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/accounts/list
    */
    public function listAccounts(): object
    {
        $this->service('ListAccounts');

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/accounts/get
    */
    public function listAccountSummaries(): object
    {
        $this->service('ListAccountSummaries');

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/accounts/provisionAccountTicket
    */
    public function provisionAccountTicket(): string
    {
        $this->service('ProvisionAccountTicket');
        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/accounts/get
    */
    public function getAccount(string $account): object
    {
        $this->service('GetAccount')->setTemplate($account);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/accounts/patch
    */
    public function updateAccount(string $account, array $params): object
    {
        $queryParams = implode(',', array_keys($params));

        $this->service('UpdateAccount')
            ->setTemplate($account)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/accounts/delete
    */
    public function deleteAccount(string $account)
    {
        $this->service('DeleteAccount')->setTemplate($account);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/accounts/getDataSharingSettings
    */
    public function getDataSharingSettings(string $account)
    {
        $this->service('GetDataSharingSettings')->setTemplate($account . '/dataSharingSettings');

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/accounts/runAccessReport
    */
    public function runAccountsAccessReport(string $account, array $dateRange)
    {
        $accessDateRange = json_encode($dateRange);
        $this->service('RunAccessReport')->setTemplate($account);
        $this->queryParams($dateRange);

        return $this->call();
    }

    /*
    * https://developers.google.com/analytics/devguides/config/admin/v1/rest/v1beta/accounts/searchChangeHistoryEvents
    */
    public function searchChangeHistoryEvents(string $account)
    {
        $this->service('SearchChangeHistoryEvents')->setTemplate($account);

        return $this->call();
    }

}
