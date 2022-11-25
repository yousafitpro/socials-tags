<?php
Route::prefix('wall')
//    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('/index',[App\Http\Controllers\iframeController::class, 'iframe'])->name('iframe.iframe');

    });
