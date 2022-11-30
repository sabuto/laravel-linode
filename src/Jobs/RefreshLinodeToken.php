<?php

namespace Sabuto\LaravelLinode\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Sabuto\LaravelLinode\Events\LinodeKeysRecieved;

class RefreshLinodeToken implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public mixed $data)
    {
    }

    public function handle()
    {
        $response = Http::get(route('linode.refresh', ['token' => $this->data['refresh_token']]));

        event(new LinodeKeysRecieved($response->json()));
    }
}
