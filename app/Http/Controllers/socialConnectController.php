<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class socialConnectController extends Controller
{

    public function connectFacebook()
    {
        return view('social.facebook-login');
    }
    public function socialConnections()
    {
       $user=User::where('email','yousaf.itpro@gmail.com')->first();
       dd($user);
        return view('social.socialConnections');
    }
}
