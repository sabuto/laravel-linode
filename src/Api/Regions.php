<?php

namespace Sabuto\LaravelLinode\Api;

use PHPUnit\Framework\MockObject\Api;
use Sabuto\LaravelLinode\Exceptions\LinodeApiException;

trait Regions
{
    use ApiBase;

    public function regionList()
    {
        $response = $this->request()->get('/regions');

        if (!$response->successful()) {
            throw LinodeApiException::make($response->json());
        }

        return $response->json();
    }

    public function regionView(string $regionId)
    {
        $response = $this->request()->get("/regions/{$regionId}");

        if (!$response->successful()) {
            throw LinodeApiException::make($response->json());
        }

        return $response->json();
    }
}
