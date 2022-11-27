<?php


use Illuminate\Support\Facades\Route;

Route::prefix('linode')->group(function () {
    Route::get('/callback', function () {
        dd('test');
    });
});
