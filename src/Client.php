<?php

namespace Certifaction;

use GuzzleHttp\Exception\GuzzleException;

class Client
{
    private \GuzzleHttp\Client $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => BASE_URI,
            'headers' => [
                'Authorization' => API_KEY,
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

        if ($uri === '/ping') {
            return $response->getBody()->getContents();
        }

        return json_decode($response->getBody());
    }
}