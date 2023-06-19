<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Trait;

use Tda\LaravelGoogleAnalyticsAdmin\AnalyticsAccount;


trait Accounts
{


    public function ListAccounts()
    {
        $this->interface('ListAccounts');

        return $this->call();
    }

    public function ListAccountSummaries()
    {
        $this->interface('ListAccountSummaries');

        return $this->call();

    }

    public function ProvisionAccountTicket()
    {
        $this->interface('ProvisionAccountTicket');
        return $this->call();
    }

    public function GetAccount(string $account)
    {
        $this->interface('GetAccount')->setTemplate($account);

        return $this->call();
    }

    public function UpdateAccount(string $account, array $params)
    {
        $queryParams = implode(',', array_keys($params));

        $this->interface('UpdateAccount')
            ->setTemplate($account)
            ->queryParams([$queryParams])
            ->queryBody($params);

        return $this->call();
    }

    public function DeleteAccount(string $account)
    {
        $this->interface('DeleteAccount')->setTemplate($account);

        return $this->call();
    }

}
