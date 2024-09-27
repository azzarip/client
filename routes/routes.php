<?php

use Azzarip\Client\Http\Controllers\PolicyController;
use Azzarip\Client\Http\Middleware\DomainKey;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::middleware(DomainKey::class)->group(function () {

    Route::get('/privacy-policy', PolicyController::class)->name('privacy-policy');
    Route::get('/cookie-policy', PolicyController::class)->name('cookie-policy');

    Route::get('/sitemap.xml', function () {
        $key = request()->get('domainKey');
        $xml = File::get(storage_path("app/sitemaps/$key.xml"));

        return response($xml, 200)->header('Content-Type', 'application/xml');
    });

    Route::get('/favicon.ico', function () {
        $key = request()->get('domainKey');

        $favicon_path = resource_path("favicons/$key.ico");
        if (! File::exists($favicon_path)) {
            $favicon_path = resource_path('favicons/base.ico');
        }

        $ico = File::get($favicon_path);

        return response($ico, 200)->header('Content-Type', 'image/vnd.microsoft.icon');
    });
});
