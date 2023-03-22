<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('logout',function (){
    auth()->logout();
    return redirect('/');
});
Route::get('first-redirect',function (){
//    if(auth()->user()->hasRole('creator'))
//{
//   return redirect('/admin/post/getAll');
//}
     if(auth()->check())
    {
           return  redirect('My-Dashboard/index');
    }
    else
    {
        return redirect('/');
    }

});

Route::any("reset",function (){
    $c1=\Illuminate\Support\Facades\Artisan::call('config:cache');
    $c2=\Illuminate\Support\Facades\Artisan::call('cache:clear');
    $c3=\Illuminate\Support\Facades\Artisan::call('config:cache');
    return "<---Restored--->";
});

Auth::routes();


include('social-tag/web/index.php');
include('social-tag/web/profile.php');
include('social-tag/web/notes.php');
include('social-tag/web/settig.php');
include('social-tag/web/tripeAdvisor.php');
include('social-tag/web/Bing.php');
include('social-tag/web/Facebook.php');
include('social-tag/web/google-my-business.php');
include('social-tag/social-connect.php');
include('social-tag/web/Users.php');


Route::any('test',function (){


    $user=new \App\Models\User();
    $user->password=bcrypt('123123');
    $user->email='user@gmail.com';
    $user->fname='Ali';
    $user->lname='Ahmad';
    $user->save();
    $user->assignRole('user');
    dd($user);
});
