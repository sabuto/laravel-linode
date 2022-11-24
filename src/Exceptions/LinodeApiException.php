<?php

namespace Sabuto\LaravelLinode\Exceptions;

use Illuminate\Support\Arr;

class LinodeApiException extends \Exception
{
    public static function make(array $errors): self
    {
        $col = collect(Arr::flatten($errors));
        dd($col);
        return new self($error);
    }
}
