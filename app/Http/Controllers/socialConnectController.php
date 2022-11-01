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
           $c=new socialconnection();
           $c->user_id=auth()->user()->id;
           $c->name="Facebook";
           $c->save();
        $c=new socialconnection();
        $c->name="Instagram";
        $c->user_id=auth()->user()->id;
        $c->save();
        dd(socialconnection::all());
        return view('social.socialConnections');
    }
}
