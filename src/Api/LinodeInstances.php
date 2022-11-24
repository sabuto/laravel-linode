<?php

namespace Sabuto\LaravelLinode\Api;

use Sabuto\LaravelLinode\Exceptions\LinodeApiException;

trait LinodeInstances
{
    use ApiBase;
    public function linodesList()
    {
        $response = $this->request()->get('/linode/instances');

        if (!$response->successful()) {
            throw LinodeApiException::make($response->json());
        }

        return $response->json();
    }
}
