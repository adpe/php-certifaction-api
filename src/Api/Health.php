<?php

namespace Certifaction\Api;

class Health extends AbstractApi
{
    /**
     * Ping the server. A "pong" is returned if the service is running.
     */
    public function ping()
    {
        return $this->get('/ping');
    }

    /**
     * Returns dependencies health.
     */
    public function dependencies()
    {
        return $this->get('/health');
    }
}
