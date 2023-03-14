<?php

Route::prefix('Settings')
    ->middleware('auth')
    ->group(function () {
////asdasd
        Route::get('/',[\App\Http\Controllers\SettingController::class,'index']);
        Route::get('calendar',[\App\Http\Controllers\SettingController::class,'calendar']);

    });
