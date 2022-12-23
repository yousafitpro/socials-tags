<?php
Route::middleware('auth')
    ->group(function () {
        Route::get('membership', [\App\Http\Controllers\SubscriptionController::class, 'membership']);
        Route::get('cancel-membership', [\App\Http\Controllers\SubscriptionController::class, 'cancel_membership']);

    });
