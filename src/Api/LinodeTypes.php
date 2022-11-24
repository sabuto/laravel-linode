<?php

namespace Sabuto\LaravelLinode\Api;

use Sabuto\LaravelLinode\Exceptions\LinodeApiException;

trait LinodeTypes
{
    use ApiBase;

    public function typesList()
    {
        $response = $this->request()->get('/linode/types');

        if (!$response->successful()) {
            throw LinodeApiException::make($response->json());
        }

        return $response->json();
    }

    public function typesView($typeId)
    {
        $response = $this->request()->get("/linode/types/{$typeId}");

        if (!$response->successful()) {
            throw LinodeApiException::make($response->json());
        }

        return $response->json();
    }
}
