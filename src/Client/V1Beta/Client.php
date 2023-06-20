<?php

namespace Tda\LaravelGoogleAnalyticsAdmin\Client\V1Beta;

use Illuminate\Support\Facades\Http;

class Client
{

    /** The name of the service. */
    public const SERVICE_NAME = 'google.analytics.admin.v1beta.AnalyticsAdminService';

    /** The default address of the service. */
    private const SERVICE_ADDRESS = 'analyticsadmin.googleapis.com';
    private const SCHEME = 'https://';

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

    public function request(string $method, string $endpoint, ?array $params = null, ?string $body = null)
    {
        $endpoint = self::SCHEME . self::SERVICE_ADDRESS . $endpoint;
        print ($method . ': ' . $endpoint . '<br>');
        $http = Http::withToken($this->token)->accept('application/json');
        if($body) {
            $endpoint .= (isset($params) ? '?' . http_build_query($params) : '');
            $response = $http->withBody($body)->{$method}($endpoint);
        } else {
            $response = $http->{$method}($endpoint, $params);
        }

        return json_decode($response->body());
    }

    public function verify()
    {
        $response = Http::get(self::SCHEME . 'www.googleapis.com/oauth2/v1/tokeninfo', ['access_token' => $this->token]);
        return json_decode($response->body());
    }


}



