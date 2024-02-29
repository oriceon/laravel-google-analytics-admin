<?php

namespace Tda\LaravelGoogleAnalyticsAdmin;

use Tda\LaravelGoogleAnalyticsAdmin\Client\V1Beta\Client;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\Accounts;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\Properties;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\DataStream;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\MeasurementProtocolSecrets;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\ConversionEvents;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\CustomDimensions;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\CustomMetrics;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\FirebaseLinks;
use Tda\LaravelGoogleAnalyticsAdmin\Traits\GoogleAdsLinks;

class GoogleAnalyticsAdmin
{
    use Accounts,
        Properties,
        DataStream,
        MeasurementProtocolSecrets,
        ConversionEvents,
        CustomDimensions,
        CustomMetrics,
        FirebaseLinks,
        GoogleAdsLinks;

    protected Client $client;
    protected $interface;


    public function __construct(string $token)
    {
        $this->client = new Client($token);
    }

    public function call()
    {
        return $this->client->request(
            $this->interface['method'],
            $this->interface['uriTemplate'],
            $this->interface['params'] ?? null,
            $this->interface['rawBody'] ?? null
        );
    }

    protected function service(string $service)
    {
        $endpointsInterface = include(__DIR__ . '/resources/analytics_admin_service_rest_client_config.php');
        $this->interface = $endpointsInterface['interfaces'][$this->client::SERVICE_NAME][$service];

        return $this;
    }

    protected function setUri($template)
    {
        $this->interface['uriTemplate'] = preg_replace('/(\{.*\})/', $template, $this->interface['uriTemplate']);

        return $this;
    }

    protected function queryParams(array $params)
    {
        $fields = $this->interface['queryParams'] ?? null;
        if ($fields) {
            foreach($fields as $k=>$key) {
                $this->interface['params'][$key] = $params[$k];
            }
        } else {
            $this->interface['params'] = $params;
        }

        return $this;
    }

    protected function queryBody(array $params)
    {
        $this->interface['rawBody'] = json_encode($params);

        return $this;
    }

    public function verifyToken()
    {
        $response = $this->client->verify();

        return $response;
    }


}
