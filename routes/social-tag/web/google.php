<?php

Route::prefix('Google')
    ->group(function () {
        Route::any('/',[\App\Http\Controllers\googleController::class,'index']);
 });
