<?php

namespace App\Http\Controllers;

use App\Models\socialConnect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class instagramController extends Controller
{
    public static function index(Request $request)
    {
        $data['list']=[];
////asdasd
        return view('circle-layout.Instagram.index',$data);
    }
    public function Connect_To_Facebook(Request $request)
    {
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
        if(!$fb->page_access_token)
        {
            return redirect()->back()->with([
                'toast' => [
                    'heading' => 'Success!',
                    'message' => 'Please connect your facebook account first',
                    'type' => 'danger',
                ]
            ]);
        }
        $url=config('myconfig.FB.ApiUrl').'/'.$fb->page_id.'/instagram_accounts';
        $url=$url.'?access_token='.$fb->page_access_token;

        $res=Http::get($url);
        //asdasd
        $data['data']=$res->json();
        dd($data);
    }
}
