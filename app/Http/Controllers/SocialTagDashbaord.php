<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SocialTagDashbaord extends Controller
{
    public function index(Request $request)
    {

        return view('circle-layout.pages.index');
    }
    public function post_login(Request $request)
    {
        $message = 'Wrong Credentials';
        $data = $request->only('email', 'password');
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {

//            if ($user->email_verified_at) {
            if (auth()->attempt($data)) {


                return redirect('My-Dashboard/index',)->with([
                    'toast' => [
                        'heading' => 'Greetings',
                        'message' => 'Welcome Back',
                        'type' => 'success',
                    ]
                ]);
            }
//            } else {
//                $message = 'Email is not verified';
//            }
        }
///asdasdasd
     Session::put('message',$message);
        return back()
            ->withInput();

    }
}
