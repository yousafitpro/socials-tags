<?php

Route::prefix('Bing')
    ->middleware('auth')
    ->group(function () {
        Route::any('/',[\App\Http\Controllers\bingController::class,'index']);
    });
