<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Client\V1Beta;

use Illuminate\Support\Facades\Http;

class Client
{

    /** The name of the service. */
    public const SERVICE_NAME = 'google.analytics.admin.v1beta.AnalyticsAdminService';

    /** The default address of the service. */
    private const SERVICE_ADDRESS = 'analyticsadmin.googleapis.com';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/analytics.edit',
        'https://www.googleapis.com/auth/analytics.readonly',
    ];

    protected string $token;


    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function request(string $method, string $endpoint, ?array $params = null, ?object $body = null)
    {
        dd($method, $endpoint, $params, $body);
        $endpoint = self::SERVICE_ADDRESS.$endpoint;
        $http = Http::withToken($this->token)->accept('application/json');
        if($body) {
            $http = $http->withBody($body);
        }
        $response = $http->{$method}($endpoint, $params);

        return json_decode($response->body());
    }


}



