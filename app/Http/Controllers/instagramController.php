<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\socialConnect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class instagramController extends Controller
{
    public function post_detail(Request $request,$id)
    {

        $data['reactions']=[];
        $data['likes']=[];
        $data['comments']=[];
        //assad
        $post=post::find(app_decrypt($id));
        $id=$post->instagram_post_id;
//        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
//        $url=config('myconfig.FB.ApiUrl').'/'.$id.'/likes?';
//        $url=$url.'&access_token='.$fb->page_access_token;
//        $res=Http::get($url);
//        if($res->status()=='200')
//        {
//            $data['data']=$res->json();
//            $data['likes']=$data['data']['data'];
//        }

        // comments
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
        $url=config('myconfig.FB.ApiUrl').'/'.$id.'/comments?';
        $url=$url.'&access_token='.$fb->page_access_token;
        $res=Http::get($url);

        if($res->status()=='200')
        {
            $data['data']=$res->json();
            $data['comments']=$data['data']['data'];
        }
//        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
//        $url=config('myconfig.FB.ApiUrl').'/'.$id.'/reactions?';
//        $url=$url.'&access_token='.$fb->page_access_token;
//        $res=Http::get($url);
//        if($res->status()=='200')
//        {
//            ///sdasdasd
//            $data['data']=$res->json();
//            $data['reactions']=$data['data']['data'];
//
//        }
        $data['post']=$post;
        // return view('circle-layout.Facebook.ajax.likes',$data);
        return view('circle-layout.Facebook.post_detail',$data);
    }
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

            $id=$data['data']['instagram_business_account']['id'];
            $fb->insta_id=$id;
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
