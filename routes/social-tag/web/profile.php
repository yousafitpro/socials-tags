<?php
Route::middleware('auth')
    ->group(function () {

        Route::get('profile/index', [\App\Http\Controllers\ProfileController::class,'index']);
        Route::post('profile/update', [\App\Http\Controllers\ProfileController::class,'update']);
        Route::post('updateBankInfo', [\App\Http\Controllers\ProfileController::class,'updateBankInfo'])->name('updateBankInfo');
        Route::get('change-password', [\App\Http\Controllers\ProfileController::class, 'changePassword']);
        Route::post('change-password', [\App\Http\Controllers\ProfileController::class, 'changePasswordPost'])->name('changePasswordPost');

    });


