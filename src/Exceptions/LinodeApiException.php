<?php

namespace Sabuto\LaravelLinode\Exceptions;

use Illuminate\Support\Arr;

class LinodeApiException extends \Exception
{
    public static function make(array $errors): self
    {
        $col = collect(Arr::flatten($errors));
        dd($col[0]);
        return new self($error);
    }
}
