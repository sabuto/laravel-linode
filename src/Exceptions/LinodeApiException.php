<?php

namespace Sabuto\LaravelLinode\Exceptions;

class LinodeApiException extends \Exception
{
    public static function make(array $errors): self
    {
        $error = $errors[0]["reason"];
        return new self($error);
    }
}
