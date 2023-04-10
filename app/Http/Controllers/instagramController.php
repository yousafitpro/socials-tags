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
        $url=config('myconfig.FB.ApiUrl').'/'.$fb->page_id.'?fields=instagram_business_account';
        $url=$url.'&access_token='.$fb->page_access_token;

        $res=Http::get($url);
        //asdasdasdas
        $data['data']=$res->json();
        if ($res->status()=='200')
        {
            dd($data['data']);
            $data['data']=$data['data']['data'][0];
            $fb->insta_id=$data['data']['id'];
            $fb->save();
            return redirect()->back()->with([
                'toast' => [
                    'heading' => 'Success!',
                    'message' => 'Instagram Account Successfully Connected',
                    'type' => 'success',
                ]
            ]);
        }

    }
}
