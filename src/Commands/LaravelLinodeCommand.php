<?php

namespace Sabuto\LaravelLinode\Commands;

use Illuminate\Console\Command;

class LaravelLinodeCommand extends Command
{
    public $signature = 'laravel-linode';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
