<?php
Route::prefix('social-connect')
    ->group(function ($router) {
        Route::get('facebook/login',[App\Http\Controllers\socialConnectController::class, 'connectFacebook']);

    });
