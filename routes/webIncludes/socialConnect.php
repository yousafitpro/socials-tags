<?php
Route::prefix('social-connect')
    ->group(function ($router) {
        Route::get('facebook/login',[App\Http\Controllers\socialConnectController::class, 'connectFacebook']);
        Route::get('index',[App\Http\Controllers\socialConnectController::class, 'socialConnections']);
        Route::post('save-facebook-token',[App\Http\Controllers\socialConnectController::class, 'saveFacebookToken']);

    });
