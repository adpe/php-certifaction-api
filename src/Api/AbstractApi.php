<?php

namespace Certifaction\Api;

use Certifaction\Client;

abstract class AbstractApi {
    private Client $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    protected function get($uri, $options = [])
    {
        return $this->client->execute('GET', $uri, $options);
    }

    protected function post($uri, $options)
    {
        return $this->client->execute('POST', $uri, $options);
    }
}