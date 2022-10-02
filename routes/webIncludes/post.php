<?php
Route::prefix('admin/post/')
    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('add',[App\Http\Controllers\Admin\PostController::class, 'addView'])->name('admin.post.add');
        Route::post('add',[App\Http\Controllers\Admin\PostController::class, 'add'])->name('admin.post.add');
        Route::get('getOne/{id}',[App\Http\Controllers\Admin\PostController::class, 'getOne'])->name('admin.post.getOne');
        Route::get('deleteOne/{id}',[App\Http\Controllers\Admin\PostController::class, 'deleteOne'])->name('admin.post.deleteOne');
        Route::post('update/{id}',[App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.post.update');
        Route::get('getAll',[App\Http\Controllers\Admin\PostController::class, 'getALL'])->name('admin.post.getAll');
    });
Route::prefix('admin/post/')
    ->group(function ($router) {
        Route::get('post-detail/{id}',[App\Http\Controllers\Admin\PostController::class, 'post_detail'])->name('admin.post.detail');
    });
