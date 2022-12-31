<?php

Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});
Route::group([
    'middleware'=>'auth:api',
    'prefix'=>'posts'

], function ($router) {

    Route::post('add',[App\Http\Controllers\API\PostController::class, 'add']);
    Route::get('getOne/{id}',[App\Http\Controllers\API\PostController::class, 'getOne']);
    Route::get('getAll',[App\Http\Controllers\API\PostController::class, 'getALL']);
    Route::post('composemessage',[App\Http\Controllers\API\PostController::class, 'composemessage']);
});
//asdasd
Route::group([
    'namespace' => 'App\Http\Controllers\API',
    'middleware'=>'auth:api'

], function ($router) {




    Route::get('get_officials',[App\Http\Controllers\API\officialController::class,'officials']);
    Route::get('loadlocations',[App\Http\Controllers\API\officialController::class,'loadlocations']);
  Route::get('loadOfficials',[App\Http\Controllers\API\officialController::class,'loadOfficials']);
  Route::post('saveOfficial',[App\Http\Controllers\API\officialController::class,'saveOfficial']);

        Route::get('showAllStates',[App\Http\Controllers\API\LigiscanController::class,'showAllStates']);

    Route::get('get_sessions',[App\Http\Controllers\API\LigiscanController::class,'get_sessions']);
    Route::post('searchPost',[App\Http\Controllers\API\LigiscanController::class,'searchPost']);
    Route::post('addToMoniteredBill',[App\Http\Controllers\API\LigiscanController::class,'addToMoniteredBill']);
    Route::get('moniteredBills',[App\Http\Controllers\API\LigiscanController::class,'moniteredBills']);
    Route::get('billDetail/{id}',[App\Http\Controllers\API\LigiscanController::class,'billDetail']);
    Route::get('showStates',[App\Http\Controllers\API\LigiscanController::class,'showStates']);
});
Route::group([
    'namespace' => 'App\Http\Controllers\API',
    'prefix' => 'v1'

], function ($router) {
    Route::get('get_leaderboard','leaderboardController@leaderboard');
});
Route::group([
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'v1'

], function ($router) {
    Route::any('get_mailmessage','MessageController@handleDelivered');
    Route::any('get_mailrecievemessage',function (\Illuminate\Http\Request $request){
        $m=new \App\Models\message();
        $m->user_id="1";
        $m->official_id="1";
        $m->subject="1";
        $m->reply=$request;
        $m->save();
        return "ok";
    });
});
Route::any("reset",function (){
    $c1=\Illuminate\Support\Facades\Artisan::call('config:cache');
    $c2=\Illuminate\Support\Facades\Artisan::call('cache:clear');
    $c3=\Illuminate\Support\Facades\Artisan::call('config:cache');
    return "<---Restored--->";
});

Route::group([
//    'middleware'=>'auth:api',
    'prefix'=>'daily'

], function ($router) {

    Route::post('create',[App\Http\Controllers\DailyroomController::class, 'create']);
    Route::get('delete/{name}',[App\Http\Controllers\DailyroomController::class, 'delete']);
});
Route::group([
    'middleware'=>'auth:api',
    'prefix'=>'amity/channels'

], function ($router) {

    Route::post('create',[App\Http\Controllers\AmityChannelController::class, 'create']);
    Route::get('delete/{id}',[App\Http\Controllers\AmityChannelController::class, 'delete']);
    Route::post('update/{id}',[App\Http\Controllers\AmityChannelController::class, 'update']);
    Route::get('list',[App\Http\Controllers\AmityChannelController::class, 'list']);
    Route::get('get/',[App\Http\Controllers\AmityChannelController::class, 'get']);
    Route::get('allUsers',[App\Http\Controllers\AmityChannelController::class, 'allUsers']);
});
Route::prefix('user/')
    ->middleware(['auth:api'])
    ->group(function ($router) {
        Route::get('set-amity-id',[App\Http\Controllers\Admin\userController::class, 'set_amity_id']);
        Route::get('amity_random_users',[App\Http\Controllers\Admin\userController::class, 'amity_random_users']);
        Route::get('get-user/{id}',[App\Http\Controllers\Admin\userController::class, 'get_user']);
        Route::get('disable-account',[\App\Http\Controllers\Admin\userController::class, 'disable_account'])->name('user.disableAccount');
    });


include('api/wallposts.php');
