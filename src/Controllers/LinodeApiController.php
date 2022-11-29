<?php

namespace Sabuto\LaravelLinode\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Sabuto\LaravelLinode\Events\LinodeKeysRecieved;

class LinodeApiController extends Controller
{
    public function authorise()
    {
        $config = config('linode.client_id');
        $response = 'code';
        $scopes = 'linodes:read_write,nodebalancers:read_write,volumes:read_write';

        return redirect("https://login.linode.com/oauth/authorize?client_id={$config}&response_type={$response}&scopes={$scopes}");
    }

    public function callback(Request $request)
    {
        $response = Http::asForm()->post("https://login.linode.com/oauth/token", [
            'code' => $request->code,
            'client_id' => config('linode.client_id'),
            'client_secret' => config('linode.client_secret')
        ]);

        event(new LinodeKeysRecieved($response->json()));

        return redirect(config('linode.redirect_after_keys'));
    }

    public function refresh(string $token)
    {
        $response = Http::asForm()->post('https://login.linode.com/oauth/token', [
            'grant_type' => 'refresh_token',
            'client_id' => config('linode.client_id'),
            'client_secret' => config('linode.client_secret'),
            'refresh_token' => $token
        ]);

        dd($response->json());
    }
}
