<?php

Route::prefix('Google')
    ->group(function () {
        Route::any('/',[\App\Http\Controllers\googleController::class,'index']);
        Route::any('Login',[\App\Http\Controllers\googleController::class,'login']);
        Route::get('Login-Call-Back',[\App\Http\Controllers\googleController::class,'Login_Call_Back']);
        Route::any('Manage-Business',[\App\Http\Controllers\googleController::class,'manage_business']);
 });
//saasdasd
