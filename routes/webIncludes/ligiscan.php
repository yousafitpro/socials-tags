<?php
Route::prefix('ligiscan/')
    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('getSessions',[App\Http\Controllers\Admin\LigiscanController::class, 'get_sessions']);

  });
Route::prefix('ligiscan/')
    ->middleware(['auth'])
    ->group(function ($router) {
        Route::post('addToMoniteredBill',[App\Http\Controllers\Admin\LigiscanController::class, 'addToMoniteredBill'])->name('ligiscan.addToMoniteredBill');
        Route::get('billDetail/{id}',[App\Http\Controllers\Admin\LigiscanController::class, 'billDetail'])->name('ligiscan.billDetail');
        Route::get('moniteredBills',[App\Http\Controllers\Admin\LigiscanController::class, 'moniteredBills'])->name('ligiscan.moniteredBills');
        Route::get('settings',[App\Http\Controllers\Admin\LigiscanController::class, 'settings'])->name('ligiscan.settings');
        Route::get('get_sessions',[App\Http\Controllers\Admin\LigiscanController::class, 'get_sessions'])->name('ligiscan.get_sessions');
        Route::get('search',[App\Http\Controllers\Admin\LigiscanController::class, 'search'])->name('ligiscan.search');
        Route::post('search',[App\Http\Controllers\Admin\LigiscanController::class, 'searchPost'])->name('ligiscan.search');
        Route::get('addState',[App\Http\Controllers\Admin\LigiscanController::class, 'addStateView'])->name('ligiscan.addState');
        Route::post('addState',[App\Http\Controllers\Admin\LigiscanController::class, 'addState'])->name('ligiscan.addState');
        Route::get('deleteState/{id}',[App\Http\Controllers\Admin\LigiscanController::class, 'deleteState'])->name('ligiscan.deleteState');
        Route::get('showStates',[App\Http\Controllers\Admin\LigiscanController::class, 'showStates'])->name('ligiscan.showStates');
        Route::get('getPerson/{id}',[App\Http\Controllers\Admin\LigiscanController::class, 'getPerson'])->name('ligiscan.getPerson');

    });
