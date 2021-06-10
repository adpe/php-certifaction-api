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

    /**
     * Update user's info.
     * Only name and file_suffix can be changed for now. id and email are required too.
     *
     * @param int $id
     * @param string $email
     * @param string $name
     * @param string $filesuffix A user can choose a file suffix to have when downloading the batch's zip file. For ex: '_secured' will have all files in the zip called 'A_Random_name_secured.pdf'
     * @return mixed|string
     */
    public function update(int $id, string $email, string $name, string $filesuffix = '')
    {
        $options = [
            'id' => $id,
            'email' => $email,
            'name' => $name,
            'file_suffix' => $filesuffix,
        ];

        return $this->put('/user', ['json' => $options]);
    }

    /**
     * Create a new user.
     * A verification email will be sent to the specified email address.
     *
     * @param string $email
     * @param string $name
     * @param string $password Clear text password, only used on user creation! Only used as input.
     * @return mixed|string
     */
    public function create(string $email, string $name, string $password)
    {
        $options = [
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'password_repeat' => $password,
        ];

        return $this->post('/user', ['json' => $options]);
    }

    /**
     * Verify user by hash.
     * By using the hash in the mail on PUT /user, you'll be able to activate that user.
     *
     * @param string $hash The hash created on registration, sent via email
     * @return mixed|string
     */
    public function verify($hash)
    {
        return $this->get('/user/optin/' . $hash);
    }
}
