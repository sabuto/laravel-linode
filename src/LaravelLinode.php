<?php

namespace Sabuto\LaravelLinode;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class LaravelLinode
{
    public function test(): mixed
    {
        $response = $this->request()->get('/account');

        if (!$response->successful()) {
            throw new \Exception($response->json('message'));
        }

        return $response->json();
    }

    protected function request(): PendingRequest
    {
        return Http::withToken(config('linode.key'))->baseUrl('https://api.linode.com/v4');
    }
}
