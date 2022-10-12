<?php

namespace Certifaction;

use GuzzleHttp\Exception\GuzzleException;

class Client
{
    private \GuzzleHttp\Client $client;

    public function __construct(string $baseuri = '', string $apikeyortoken = '')
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $baseuri,
            'cookies' => true,
            'headers' => [
                'Authorization' => $apikeyortoken,
            ]
        ]);

        return $this->client;
    }

    public function execute($method, $uri, $options = [])
    {
        try {
            $response = $this->client->request($method, $uri, $options);
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }

        if ($uri === '/ping' || $uri === '/file/register') {
            return $response->getBody()->getContents();
        }

        if ($uri === '/logout' && $response->getStatusCode() === 205) {
            return true;
        }

        return json_decode($response->getBody());
    }
}