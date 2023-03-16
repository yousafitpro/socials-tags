<?php

namespace App\Http\Controllers;

use App\Models\socialConnect;
use App\Models\socialconnection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class socialConnectController extends Controller
{

    public function connectFacebook()
    {
        return view('social.facebook-login');
    }
    public function save_twitter_token(Request $request)
    {
        $data['code']=$request->code;
        $data['redirect_uri']=url("social-connect/index");
        $data['code_verifier']='challenge';
        $data['grant_type']='authorization_code';
        $data['client_id']=config("myconfig.TW.client_id");
       $req2=Http::post('https://api.twitter.com/2/oauth2/token',$data);
       if ($req2->status()=="200")
       {
           $con=null;
           if(socialConnect::where(['user_id'=>auth()->user()->id,'platform'=>'twitter'])->exists())
           {
                $con=socialConnect::where(['user_id'=>auth()->user()->id,'platform'=>'twitter'])->first();
           }else{
                $con=new socialConnect();
           }
           $req2=$req2->json();
           $con->platform='twitter';
           $con->access_token=$req2['access_token'];
           $con->refresh_token=$req2['refresh_token'];
           $con->status="Connected";
           $con->save();
           return response()->json(["message"=>"Twitter Successfully Connected"],200);
       }else
       {
           return response()->json(["message"=>"Twitter Cannot be Connected"],409);
       }



    }
    public function saveFacebookToken(Request $request)
    {
        $sc=null;
        if(socialConnect::where(['user_id'=>auth()->user()->id,'platform'=>'Facebook'])->exists())
        {
            $sc=socialConnect::where(['user_id'=>auth()->user()->id,'platform'=>'Facebook'])->first();
        }else{
            $sc=new socialConnect();
        }
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
