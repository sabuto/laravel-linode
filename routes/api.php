<?php

use Illuminate\Support\Facades\Route;
use Sabuto\LaravelLinode\Controllers\LinodeApiController;

Route::prefix('linode')->group(function() {
   Route::get('/callback', [LinodeApiController::class, 'callback']);
   Route::get('/authorise/{scopes}', [LinodeApiController::class, 'authorise']);
});
