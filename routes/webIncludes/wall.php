<?php
Route::prefix('wall')
//    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('iframe',[App\Http\Controllers\iframeController::class, 'iframe'])->name('iframe.iframe');

    });
