<?php

namespace Matomo\ReportingApi;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    protected $url;
    protected $token;
    protected $guzzle;
    protected $format = 'json';

    protected function __construct()
    {
    }

    public static function create($url, $token)
    {
        $client = new self();
        $client->url = $url;
        $client->token = $token;
        $client->guzzle = new GuzzleClient();
        return $client;
    }

    public function callApi($method, $arguments = [])
    {
        return $this->call('API', $method, $arguments);
    }

    public function call($module, $method, $arguments = [])
    {
        $parameters = [
            'module' => $module,
            'method' => $method,
            'format' => $this->format,
            'token_auth' => $this->token,
        ];

        $parameters = array_merge($parameters, $arguments);

        $response = $this->guzzle->post(
            $this->url,
            [
                'form_params' => $parameters
            ]
        );


        $data = json_decode($response->getBody(), true);
        return $data;
    }

    public function getModule($name)
    {
        $m = new Module($this, $name);
        return $m;
    }
}
