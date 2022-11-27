<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::prefix('linode')->group(function () {
    Route::get('/callback', function (Request $request) {
        $response = Http::asForm()->post("https://login.linode.com/oauth/token", [
            'code' => $request->code,
            'client_id' => config('linode.client_id'),
            'client_secret' => config('linode.client_secret')
        ]);

        dd($response->json());
    });

    Route::get('/authorise', function () {
        $c = config('linode.client_id');
        $r = 'code';
        $scopes = 'linodes:read_write';

        return redirect("https://login.linode.com/oauth/authorize?client_id={$c}&response_type={$r}&scopes={$scopes}");
    });

});
