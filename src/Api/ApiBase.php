<?php

namespace Sabuto\LaravelLinode\Api;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

trait ApiBase
{
    protected function request(): PendingRequest
    {
        return Http::withToken(config('linode.key'))->baseUrl('https://api.linode.com/v4');
    }
}
