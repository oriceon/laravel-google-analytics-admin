<?php

namespace Tda\LaravelGoogleAnalyticsAdmin;

use Tda\LaravelGoogleAnalyticsAdmin\Client\V1Beta\Client;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\Accounts;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\Properties;

class GoogleAnalyticsAdmin
{
    use Accounts, Properties;

    protected Client $client;
    protected $interface;


    public function __construct(string $token)
    {
        $this->client = new Client($token);
    }

    public function call()
    {
        return $this->client->request($this->interface['method'], $this->interface['uriTemplate'], $this->interface['params'] ?? null, $this->interface['rawBody'] ?? null);
    }

    protected function interface(string $service)
    {
        $endpointsInterface = include(__DIR__ . '/resources/analytics_admin_service_rest_client_config.php');
        $this->interface = $endpointsInterface['interfaces'][$this->client::SERVICE_NAME][$service];

        return $this;
    }

    protected function setTemplate($template)
    {
        $this->interface['uriTemplate'] = preg_replace('/(\{.*\})/', $template, $this->interface['uriTemplate']);
        return $this;
    }

    protected function queryParams(array $params)
    {
        $fields = $this->interface['queryParams'];

        foreach($fields as $k=>$key) {
            $this->interface['params'][$key] = $params[$k];
        }

        return $this;
    }

    protected function queryBody(array $params)
    {
        $this->interface['rawBody'] = (object) $params;

        return $this;
    }



}
