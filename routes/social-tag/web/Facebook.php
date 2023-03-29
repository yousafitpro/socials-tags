<?php

Route::prefix('Facebook')
    ->middleware('auth')
    ->group(function () {
        Route::any('/',[\App\Http\Controllers\facebookController::class,'index']);
        Route::get("Connect-Page")
    });
