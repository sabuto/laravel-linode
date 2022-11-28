<?php

namespace Sabuto\LaravelLinode\Tests;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sabuto\LaravelLinode\Traits\HasLinodeOAuth;

class User extends Model implements Authorizable, Authenticatable
{
    use HasLinodeOAuth, \Illuminate\Foundation\Auth\Access\Authorizable, \Illuminate\Auth\Authenticatable, HasFactory;

    protected $guarded = [];

    protected $table = 'users';

    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
