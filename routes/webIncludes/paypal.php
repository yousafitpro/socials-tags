<?php



Route::prefix('paypal')
    ->group(function (){
        Route::any('complete-payment/{plan}',[\App\Http\Controllers\paypalController::class,'complete_payment']);
        Route::post('init-payment',[\App\Http\Controllers\paypalController::class,'init_payment']);
    });
Route::prefix('paypal')
    ->middleware(['auth','is_admin'])
    ->group(function (){
        Route::any('payments',[\App\Http\Controllers\paypalController::class,'payments']);
    });
Route::prefix('paypal')
    ->group(function (){
        Route::any('webhook',[\App\Http\Controllers\paypalController::class,'webhook']);
    });
