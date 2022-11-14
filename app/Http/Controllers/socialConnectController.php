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
    public function save_twitter_token(Request $request)
    {
        dd($request->code);
    }
    public function saveFacebookToken(Request $request)
    {
        $sc=socialconnection::find($request->con_id);
        $sc->access_token=$request->access_token;
        $sc->userid=$request->userid;
        $sc->expire_in=$request->expire_in;
        $sc->expire_at=$request->expire_at;
        $sc->status="Connected";
        $sc->save();
    }
    public function socialConnections()
    {

        return view('social.socialConnections');
    }
    public function disconnect_connection($id)
    {
        //asdasdasdsad
        $c=socialconnection::find($id);
        $c->status="Disconnected";
        $c->save();
        return redirect()->back();
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
        if ($name=="Twitter")
        {
            $icon=asset('icon/Twitter-logo-png.png');
        }
        return $icon;
    }
}
