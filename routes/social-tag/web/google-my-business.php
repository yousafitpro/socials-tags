<?php

Route::prefix('google-my-business')
    ->middleware('auth')
    ->group(function () {
        Route::any('/',[\App\Http\Controllers\googleMyBusinessController::class,'index']);
    });
