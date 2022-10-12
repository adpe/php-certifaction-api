<?php

namespace Certifaction\Api;

class Authentication extends AbstractApi
{
    /**
     * Perform an authentication.
     * Only username and password are taken from the UserRepresentation object you send.
     *
     * @param string $email
     * @param string $password Clear text password
     * @return mixed|string
     */
    public function login(string $email, string $password)
    {
        $options = [
            'email' => $email,
            'password' => $password,
        ];

        return $this->post('/login', ['json' => $options]);
    }

    /**
     * Logs the user out.
     *
     * @return bool|mixed|string
     */
    public function logout()
    {
        return $this->post('/logout');
    }

    /**
     * Generate a new token.
     *
     * @param string $name A name/note of the token to make it recognizable. Min 3, max. 60 characters.
     * @return mixed|string
     */
    public function generate_token(string $name)
    {
        $options = [
            'name' => $name
        ];

        return $this->post('/token', ['json' => $options]);
    }
}
