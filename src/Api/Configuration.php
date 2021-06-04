<?php

namespace Certifaction\Api;

class Configuration extends AbstractApi
{
    /**
     * Retrieve configuration parameters.
     */
    public function retrieve()
    {
        return $this->get('/config');
    }
}
