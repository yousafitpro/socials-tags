<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
Route::get('pk',function (){

    return view('agora.livestreaming');
});
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

///asd
Route::get('/password/{p}',function ($p){
    return bcrypt($p);
});
Route::get('/', [App\Http\Controllers\iframeController::class, 'iframe']);
Route::get('/test', function () {
//    return view('auth.passwords.confirm');
    $data=encrypt("12121212");

    $data=decrypt($data);
    dd($data);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('success-redirect',function (){
    sleep(2);
return redirect('/');
});
Route::get('failure-redirect',function (){

    sleep(2);
    return redirect('/');
});
Route::get('logout',function (){
    auth()->logout();
    return redirect('/');
});
Route::get('first-redirect',function (){
if(auth()->user()->type=='user')
{
   return redirect('/');
}
    if(auth()->user()->type=='supper-admin')
    {
           return  redirect('user/update-profile');
    }
});

Route::prefix('Dashboard/')
    ->middleware(['auth'])
    ->group(function ($router) {
        Route::get('/',[App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
    });
// webConfig
include('webIncludes/webConfig.php');
// user
include('webIncludes/user.php');
// admin
include('webIncludes/admin.php');
//role
include('webIncludes/role.php');
//post
include('webIncludes/post.php');
//Ligiscan
include('webIncludes/ligiscan.php');
//official
include('webIncludes/official.php');
//inbox
include('webIncludes/inbox.php');
//regulationsGov
include('webIncludes/regulationsgov.php');
//Route::view('SPA/{any}','apps.SPA')->where('any', '.*');
Route::prefix('SPA')
  ->middleware('auth')
  ->any('{any?}', function(){
  return view('apps.SPA');
})->where('any', '.*');

Route::any("reset",function (){
    $c1=\Illuminate\Support\Facades\Artisan::call('config:cache');
    $c2=\Illuminate\Support\Facades\Artisan::call('cache:clear');
    $c3=\Illuminate\Support\Facades\Artisan::call('config:cache');
    return "<---Restored--->";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/privacy-policy', function (){
    return view('home.privacy_policy');
})->name('privacy_policy');
Route::get('queue-work', function () {
    Artisan::call('queue:work');
    echo 'success';
});
Route::group([
    'middleware'=>'auth',
    'prefix'=>'daily'

], function ($router) {

    Route::any('create',[App\Http\Controllers\DailyroomController::class, 'create'])->name('daily.create');
    Route::get('delete/{name}',[App\Http\Controllers\DailyroomController::class, 'delete'])->name('daily.delete');
});
//Route::get('queue-work', function () {
//    Artisan::call('queue:work --stop-when-empty', []);
//    echo 'success';
//});
include('webIncludes/hooks.php');


include('webIncludes/wall.php');
include('webIncludes/socialConnect.php');
include('webIncludes/subscription.php');
include('Security.php');
include('webIncludes/paypal.php');
