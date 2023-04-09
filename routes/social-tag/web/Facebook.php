<?php

Route::prefix('Facebook')
    ->middleware('auth')
    ->group(function () {
        Route::any('/',[\App\Http\Controllers\facebookController::class,'index']);
        Route::get("Connect-Page",[\App\Http\Controllers\facebookController::class,'connect_page']);
        Route::get("Comments/{id}",[\App\Http\Controllers\facebookController::class,'get_comments']);
        Route::get("Likes/{id}",[\App\Http\Controllers\facebookController::class,'get_likes']);
        Route::get("Post-Detail/{id}",[\App\Http\Controllers\facebookController::class,'post_detail']);
        Route::post("Create-Post",[\App\Http\Controllers\facebookController::class,'create_post']);
        Route::post("Delete-Post/{id}",[\App\Http\Controllers\facebookController::class,'create_post']);
      //  Route::post("Create-Post",[\App\Http\Controllers\facebookController::class,'create_post']);
    });
