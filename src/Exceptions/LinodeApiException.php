<?php

namespace Sabuto\LaravelLinode\Exceptions;

use Illuminate\Support\Arr;

class LinodeApiException extends \Exception
{
    public static function make(array $errors): self
    {
        $error = Arr::get($errors, 'errors.reason');
        return new self($error);
    }
}
