<?php

Route::prefix('Tripe-Advisor')
    ->middleware('auth')
    ->group(function () {
        Route::any('/',[\App\Http\Controllers\tripeAdvisorController::class,'search']);
    });
//assadasd
