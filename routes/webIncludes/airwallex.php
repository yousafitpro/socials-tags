<?php



Route::prefix('airwallex')
    ->group(function (){
        Route::any('webhook',[\App\Http\Controllers\airwallexController::class,'webhook']);
    });
