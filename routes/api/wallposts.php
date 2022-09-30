<?php
Route::group([
    'prefix' => 'wall'

], function () {

    Route::get('posts', [\App\Http\Controllers\iframeController::class,'iframe']);

});
