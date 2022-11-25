<?php

namespace Sabuto\LaravelLinode\Api;

use Sabuto\LaravelLinode\Exceptions\LinodeApiException;

trait Images
{
    use ApiBase;

    public function imagesList()
    {
        $response = $this->request()->get('/images');

        if (! $response->successful()) {
            throw LinodeApiException::make($response->json());
        }
//
        return $response->json();
    }
}
