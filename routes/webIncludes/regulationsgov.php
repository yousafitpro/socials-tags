<?php

Route::prefix('regulationsgov/')
    ->middleware(['auth'])
    ->group(function ($router) {

        Route::get('search',[App\Http\Controllers\Admin\regulationsGovController::class, 'searchView'])->name('regulationsgov.search');
        Route::post('search',[App\Http\Controllers\Admin\regulationsGovController::class, 'search'])->name('regulationsgov.search');
        Route::get('detail/{id}/{obid}',[App\Http\Controllers\Admin\regulationsGovController::class, 'detail'])->name('regulationsgov.detail');


        Route::get('commentDetail',[App\Http\Controllers\Admin\regulationsGovController::class, 'getCommentDetail'])->name('regulationsgov.commentDetail');
        Route::post('postComment',[App\Http\Controllers\Admin\regulationsGovController::class, 'postComment'])->name('regulationsgov.postComment');

    });
