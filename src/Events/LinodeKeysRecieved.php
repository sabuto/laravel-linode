<?php

namespace Sabuto\LaravelLinode\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LinodeKeysRecieved
{
    use Dispatchable, SerializesModels;

    public function __construct(public mixed $data)
    {

    }
}
