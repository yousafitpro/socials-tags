<?php
Route::prefix('admin/inbox/')
    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('all/{id}',[App\Http\Controllers\MessageController::class, 'inbox'])->name('admin.mail.inbox');
        Route::get('compose/{id}',[App\Http\Controllers\MessageController::class, 'compose'])->name('admin.mail.compose');
        Route::post('sendMessage',[App\Http\Controllers\MessageController::class, 'sendMessage'])->name('admin.mail.sendMessage');
        Route::get('view/{id}',[App\Http\Controllers\MessageController::class, 'view'])->name('admin.mail.view');

    });
