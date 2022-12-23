<?php



Route::prefix('paypal')
    ->group(function (){
        Route::any('complete-payment',[\App\Http\Controllers\paypalController::class,'complete_payment']);
        Route::post('init-payment',[\App\Http\Controllers\paypalController::class,'init_payment']);
    });
