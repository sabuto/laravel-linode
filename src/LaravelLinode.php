<?php

namespace Sabuto\LaravelLinode;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Sabuto\LaravelLinode\Api\ApiBase;
use Sabuto\LaravelLinode\Api\LinodeTypes;
use Sabuto\LaravelLinode\Exceptions\LinodeApiException;

class LaravelLinode
{
    use LinodeTypes;

    public function getKey(): string
    {
        return config('linode.key');
    }
}
