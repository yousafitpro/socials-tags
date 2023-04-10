<?php

Route::prefix('Instagram')
    ->middleware('auth')
    ->group(function () {
        Route::any('/',[\App\Http\Controllers\instagramController::class,'index']);
        Route::any('Connect-To-Facebook',[\App\Http\Controllers\instagramController::class,'Connect_To_Facebook']);

        Route::get("Post-Detail/{id}",[\App\Http\Controllers\instagramController::class,'post_detail']);
        //        Route::get("Connect-Page",[\App\Http\Controllers\facebookController::class,'connect_page']);
//        Route::get("Comments/{id}",[\App\Http\Controllers\facebookController::class,'get_comments']);
//        Route::get("Likes/{id}",[\App\Http\Controllers\facebookController::class,'get_likes']);
//        Route::get("Post-Detail/{id}",[\App\Http\Controllers\facebookController::class,'post_detail']);
//        Route::get("Post-Delete/{id}",[\App\Http\Controllers\facebookController::class,'delete_post']);
//        Route::post("Create-Post",[\App\Http\Controllers\facebookController::class,'create_post']);
//        Route::post("Delete-Post/{id}",[\App\Http\Controllers\facebookController::class,'create_post']);
      //  Route::post("Create-Post",[\App\Http\Controllers\facebookController::class,'create_post']);
    });
