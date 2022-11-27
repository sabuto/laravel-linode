<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::prefix('linode')->group(function () {
    Route::post('/callback', function (Request $request) {
        dd($request);
    });

    Route::get('/authorise', function (){
        $c = config('linode.client_id');
        $r = 'code';
        $scopes = 'linodes:read_write';

        return redirect("https://login.linode.com/oauth/authorize?client_id={$c}&response_type={$r}&scopes={$scopes}");
    });

});
