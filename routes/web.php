<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::prefix('linode')->group(function () {
    Route::post('/callback', function (Request $request) {
        dd($request);
    });

    Route::get('/authorise', function (){
        Http::asForm()->post('https://login.linode.com/oauth/token',[
            'client_id' => config('linode.client_id'),
            'client_secret' => config('linode.client_secret')
        ]);
    });
});
