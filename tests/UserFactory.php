<?php

namespace Sabuto\LaravelLinode\Tests;

use Illuminate\Support\Str;
use Orchestra\Testbench\Factories\UserFactory as TestBenchUserFactory;

class UserFactory extends TestBenchUserFactory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
