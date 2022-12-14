<?php

namespace Sabuto\LaravelLinode\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Sabuto\LaravelLinode\Events\LinodeKeysRecieved;
use Sabuto\LaravelLinode\Exceptions\LinodeApiException;
use Sabuto\LaravelLinode\Jobs\RefreshLinodeToken;

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
        $response = Http::asForm()->post('https://login.linode.com/oauth/token', [
            'code' => $request->code,
            'client_id' => config('linode.client_id'),
            'client_secret' => config('linode.client_secret'),
        ]);

        $json = $response->json();

        event(new LinodeKeysRecieved($json));

        RefreshLinodeToken::dispatch($json)->delay(now()->addSeconds($json['expires_in'] - 60));

        return redirect(config('linode.redirect_after_keys'));
    }

    public function refresh(string $token)
    {
        $response = Http::asForm()->post('https://login.linode.com/oauth/token', [
            'grant_type' => 'refresh_token',
            'client_id' => config('linode.client_id'),
            'client_secret' => config('linode.client_secret'),
            'refresh_token' => $token,
        ]);

        if (! $response->successful()) {
            throw new LinodeApiException("Can't refresh token, you need to reauthorise");
        }

        $json = $response->json();

        RefreshLinodeToken::dispatch($response->json())->delay(now()->addSeconds($json['expires_in'] - 60));

        return response($json, 200);
    }
}
