<?php

namespace Certifaction\Api;

class File extends AbstractApi
{
    /**
     * Searches authenticated user's files by name.
     */
    public function search(
        string $name = '',
        string $sort = 'asc',
        string $by = 'filename',
        int $page = 1,
        int $size = 10
    ) {
        $options = [
            'name' => $name,
            'sort' => $sort,
            'by' => $by,
            'page' => $page,
            'size' => $size,
        ];

        return $this->get('/file', ['query' => $options]);
    }

    /**
     * Checks whether the file has been registered and by whom. A file can be revoked, so make sure you handle the returned revoked property. If the file isn't.
     */
    public function verify(string $hash)
    {
        return $this->get('/file/' . $hash . '/verify');
    }
}