<?php
Route::get('/',function (){
    return redirect('login');
});
Route::post('post-login',[\App\Http\Controllers\SocialTagDashbaord::class,'post_login'])->name("postLogin");

Route::prefix('My-Dashboard')
    ->middleware('auth')
    ->group(function () {

        Route::get('index',[\App\Http\Controllers\SocialTagDashbaord::class,'index']);
        Route::get('customers',[\App\Http\Controllers\SocialTagDashbaord::class,'customers']);
        Route::get('posts',[\App\Http\Controllers\SocialTagDashbaord::class,'posts']);
        Route::get('posts',[\App\Http\Controllers\SocialTagDashbaord::class,'posts']);
        Route::get('social-profiles',[\App\Http\Controllers\SocialTagDashbaord::class,'social_profiles']);
        Route::post('publish-post',[\App\Http\Controllers\SocialTagDashbaord::class,'publish_post']);
        Route::get('publish-post',[\App\Http\Controllers\SocialTagDashbaord::class,'publish_post_view']);
    });
