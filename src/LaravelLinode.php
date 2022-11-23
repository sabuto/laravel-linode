<?php

namespace Sabuto\LaravelLinode;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Sabuto\LaravelLinode\Exceptions\LinodeApiException;

class LaravelLinode
{
    public function test(): mixed
    {
        $response = $this->request()->get('/account');

        if (!$response->successful()) {
            throw LinodeApiException::make($response->json());
        }

        return $response->json();
    }

    public function getKey(): string
    {
        return config('linode.key');
    }

    protected function request(): PendingRequest
    {
        return Http::withToken(config('linode.key'))->baseUrl('https://api.linode.com/v4');
    }
}
