<?php

namespace App\Http\Controllers;

use App\Models\socialconnection;
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

        return view('social.socialConnections');
    }
    public static function getIcon($name)
    {
        $icon='';
        if ($name=="Facebook")
        {
            $icon=asset('icon/facebook-logo.png');
        }
        if ($name=="Instagram")
        {
            $icon=asset('icon/instagram-logo.png');
        }
    }
}
