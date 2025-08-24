<?php

use Azzarip\Client\Http\Controllers\PolicyController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get('/privacy-policy', PolicyController::class)->name('privacy-policy');
    Route::get('/cookie-policy', PolicyController::class)->name('cookie-policy');
});
