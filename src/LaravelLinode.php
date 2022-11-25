<?php

namespace Sabuto\LaravelLinode;

use Sabuto\LaravelLinode\Api\Images;
use Sabuto\LaravelLinode\Api\LinodeInstances;
use Sabuto\LaravelLinode\Api\LinodeTypes;
use Sabuto\LaravelLinode\Api\Regions;

class LaravelLinode
{
    use LinodeTypes, LinodeInstances, Regions, Images;

    public function getKey(): string
    {
        return config('linode.key');
    }
}
