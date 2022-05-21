<?php

Route::prefix('official/')
    ->middleware(['auth'])
    ->group(function ($router) {

        Route::get('search',[App\Http\Controllers\Admin\officialController::class, 'search'])->name('official.search');
        Route::post('search',[App\Http\Controllers\Admin\officialController::class, 'searchPost'])->name('official.search');
        Route::get('loadlocations',[App\Http\Controllers\Admin\officialController::class, 'loadlocations'])->name('official.loadlocations');
        Route::get('loadOfficials',[App\Http\Controllers\Admin\officialController::class, 'loadOfficials'])->name('official.loadOfficials');
        Route::get('officials',[App\Http\Controllers\Admin\officialController::class, 'officials'])->name('official.officials');
        Route::post('saveOfficial',[App\Http\Controllers\Admin\officialController::class, 'saveOfficial'])->name('official.saveOfficial');


    });
