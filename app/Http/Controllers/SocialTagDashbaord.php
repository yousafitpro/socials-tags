<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SocialTagDashbaord extends Controller
{
    public function index(Request $request)
    {

        return view('circle-layout.pages.index');
    }
    public function publish_post_view(Request $request)
    {
        return view('circle-layout.dashboard.publish');
    }
    public function publish_post(Request $request)
    {
        //return view('circle-layout.pages.index');
    }
    public function customers(Request $request)
    {
        return view('circle-layout.dashboard.customers');
    }
    public function posts(Request $request)
    {
        $data['posts']=post::where(['deleted_at'=>null,'user_id'=>auth()->id()])->where(function ($q){
                $q->orWhere('facebook_post_id','!=',null)
                  ->orWhere('instagram_post_id','!=',null)
                  ->orWhere('linked_post_id','!=',null)
                  ->orWhere('twitter_post_id','!=',null);
        })->latest()->get();
        return view('circle-layout.dashboard.posts',$data);
    }
    public function social_profiles(Request $request)
    {
        return view('circle-layout.dashboard.social_profiles');
    }
    public function post_login(Request $request)
    {
        ///sdfsdfsdfsdfdfsdffsdfsdfsdfsdfsdfsdfsdf
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
            //asdasdasdasd
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
