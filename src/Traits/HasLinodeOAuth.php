<?php

namespace Sabuto\LaravelLinode\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Sabuto\LaravelLinode\Models\Linode;

trait HasLinodeOAuth
{
    public function linode(): MorphOne
    {
        return $this->morphOne(Linode::class, 'owner');
    }
}
