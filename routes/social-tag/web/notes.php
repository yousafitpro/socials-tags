<?php

Route::prefix('Notes')
    ->middleware('auth')
    ->group(function () {

        Route::get('/',[\App\Http\Controllers\noteController::class,'index']);

    });
