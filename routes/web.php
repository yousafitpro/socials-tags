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


Route::any('test-123',function (){
    $user=\App\Models\User::where("email",'creator@gmail.com')->first();
    $user->assignRole('user');
    dd($user);
});
