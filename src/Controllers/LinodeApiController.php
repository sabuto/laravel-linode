<?php

namespace Sabuto\LaravelLinode\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class LinodeApiController extends Controller
{
    public function authorise($scopes)
    {
        $base_url = 'https://login.linode.com/oauth/authorize?';
        $config = config('linode.client_id');
        $response = 'code';
        collect($scopes);
        dd($scopes);
        $scopes->each(function ($item, $key) {
            echo $item . ' ' . $key;
        });
    }

    public function callback(Request $request)
    {
        $response = Http::asForm()->post("https://login.linode.com/oauth/token", [
            'code' => $request->code,
            'client_id' => config('linode.client_id'),
            'client_secret' => config('linode.client_secret')
        ]);

        dd($response->json());
    }
}
