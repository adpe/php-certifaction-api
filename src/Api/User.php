<?php

namespace Certifaction\Api;

class User extends AbstractApi
{
    /**
     * Retrieve logged in user's info.
     */
    public function info()
    {
        return $this->get('/user');
    }
}
