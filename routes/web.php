<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::prefix('linode')->group(function () {
    Route::post('/callback', function (Request $request) {
        dd($request);
    });

    Route::get('/authorise', function (){
        Http::post('https://login.linode.com/oauth/authorize',[
            'client_id' => config('linode.client_id'),
            'response_type' => 'code',
            'scopes' => 'linodes:read_write'
        ]);
    });
});
