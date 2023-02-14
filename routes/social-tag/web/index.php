<?php
Route::get('/',function (){
    return redirect('login');
});
Route::post('post-login',[\App\Http\Controllers\SocialTagDashbaord::class,'post_login'])->name("postLogin");

Route::prefix('My-Dashboard')
    ->middleware('auth')
    ->group(function () {

        Route::get('index',[\App\Http\Controllers\SocialTagDashbaord::class,'index']);
    });
