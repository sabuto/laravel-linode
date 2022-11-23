<?php

namespace Sabuto\LaravelLinode\Exceptions;

use Illuminate\Support\Arr;

class LinodeApiException extends \Exception
{
    public static function make(array $errors): self
    {
        $error = Arr::get($errors, 'errors.reason');
        dd($error);
        return new self($error);
    }
}
