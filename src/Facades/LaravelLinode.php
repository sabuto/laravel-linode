<?php

namespace Sabuto\LaravelLinode\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sabuto\LaravelLinode\LaravelLinode
 */
class LaravelLinode extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sabuto\LaravelLinode\LaravelLinode::class;
    }
}
