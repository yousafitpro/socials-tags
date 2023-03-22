<?php

Route::middleware('auth')
    ->group(function () {
        Route::get('/Users',[\App\Http\Controllers\userController::class,'index']);
        Route::get('/User/Add',[\App\Http\Controllers\userController::class,'add']);
        Route::post('/User/Add',[\App\Http\Controllers\userController::class,'create']);
        Route::get('/User/delete',[\App\Http\Controllers\userController::class,'delete']);
        Route::get('/User/edit/{id}',[\App\Http\Controllers\userController::class,'edit']);
        Route::post('/User/update/{id}',[\App\Http\Controllers\userController::class,'update']);
        Route::post('/User/update-password/{id}',[\App\Http\Controllers\userController::class,'update_password']);
        Route::get('/User/update-status',[\App\Http\Controllers\userController::class,'update_status']);
    });
