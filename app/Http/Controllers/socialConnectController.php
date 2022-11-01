<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class socialConnectController extends Controller
{

    public function connectFacebook()
    {
        return view('social.facebook-login');
    }
    public function socialConnections()
    {
        return view('social.socialConnections');
    }
}
