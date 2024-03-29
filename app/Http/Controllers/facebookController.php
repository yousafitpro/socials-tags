<?php

namespace App\Http\Controllers;

use App\Jobs\createFacebookPost;
use App\Jobs\createInstagramPost;
use App\Models\post;
use App\Models\socialConnect;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class facebookController extends Controller
{
    public $SRC = 'postimages/';
    public static function index(Request $request)
    {
        $data['list']=[];
////asdasd
        return view('circle-layout.Facebook.index',$data);
    }
    public function connect_page(Request $request)
    {
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
        $fb->access_token=$request->user_acccess_token;
        $fb->userid=$request->user_id;
        $fb->page_id=$request->page_id;
        $fb->page_name=$request->page_name;
        $fb->page_access_token=$request->page_access_token;
        $fb->save();
        return redirect()->back()->with([
            'toast' => [
                'heading' => 'Success!',
                'message' => 'Account Successfully Connected',
                'type' => 'success',
            ]
        ]);

    }
    public function create_post(Request $request)
    {
        $is_posted=false;
      $post=new post();
      $post->title=$request->title;
      $post->user_id=auth()->id();
      $post->post_content=$request->post_content;
      $post->link=$request->link;
      $post->save();
      $photo_path=null;
        $profile_image='';
        $photo = $request->file('photo');
        if ($photo) {
            $profile_image = saveImage($photo,$this->SRC);

            $post->photo=$profile_image;
            $post->save();
            $photo_path=asset($this->SRC.$post->photo);

        }
        $tempData['post']=$post;
//asdasdasdasdsad
       if($request->has('facebook') && socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->where('page_access_token','!=',null)->exists())
       {
           $post->facebook_post_id='Uploading';
           $post->save();
           createFacebookPost::dispatch($post,$photo_path)->delay(Carbon::now(config('app.timezone'))->addMinutes(1));



       }
        if ($request->has('instagram') && socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->where('insta_id','!=',null)->exists())
        {
            //SasAS
            $post->instagram_post_id='Uploading';
            $post->save();
            createInstagramPost::dispatch($post,$photo_path)->delay(Carbon::now(config('app.timezone'))->addMinutes(1));

        }


        return redirect()->back()->with([
               'toast' => [
                   'heading' => 'Success!',
                   'message' => 'Post Successfully Created',
                   'type' => 'success',
               ]
           ]);

    }
    public function get_comments(Request $request,$id)
    {
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
        $url=config('myconfig.FB.ApiUrl').'/'.$id.'/comments?';

        $url=$url.'&access_token='.$fb->page_access_token;

        $res=Http::get($url);
        $data['data']=$res->json();
        $data['data']=$data['data']['data'];

        return view('circle-layout.Facebook.ajax.comments',$data);
    }
    public function get_likes(Request $request,$id)
    {
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
        $url=config('myconfig.FB.ApiUrl').'/'.$id.'/likes?';

        $url=$url.'&access_token='.$fb->page_access_token;

        $res=Http::get($url);
        $data['data']=$res->json();
        $data['data']=$data['data']['data'];

        return view('circle-layout.Facebook.ajax.likes',$data);
    }
    public function delete_post(Request $request,$id)
    {
        $post=post::find(app_decrypt($id));
        $id=$post->facebook_post_id;
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
        $url=config('myconfig.FB.ApiUrl').'/'.$id;
        $url=$url.'?access_token='.$fb->page_access_token;

        $res=Http::delete($url);
        $data['data']=$res->json();

        if($res->status()=='200' && $data['data']['success']==true)
        {

            $post->facebook_post_id=null;
            $post->save();
            return redirect(url('My-Dashboard/posts'))->with([
                'toast' => [
                    'heading' => 'Success!',
                    'message' => 'Account Successfully Deleted',
                    'type' => 'success',
                ]
            ]);

        }else{
            $data['data']=$res->json();
            $post->facebook_post_id=null;
            $post->save();
            dd($data);
        }
    }
    public function post_detail(Request $request,$id)
    {

        $data['reactions']=[];
        $data['likes']=[];
        $data['comments']=[];
        $post=post::find(app_decrypt($id));
        $id=$post->facebook_post_id;
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
        $url=config('myconfig.FB.ApiUrl').'/'.$id.'/likes?';
        $url=$url.'&access_token='.$fb->page_access_token;
        $res=Http::get($url);
        if($res->status()=='200')
        {
            $data['data']=$res->json();
            $data['likes']=$data['data']['data'];
        }

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
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
        $url=config('myconfig.FB.ApiUrl').'/'.$id.'/reactions?';
        $url=$url.'&access_token='.$fb->page_access_token;
        $res=Http::get($url);
        if($res->status()=='200')
        {
            ///sdasdasd
            $data['data']=$res->json();
            $data['reactions']=$data['data']['data'];

        }
        $data['post']=$post;
       // return view('circle-layout.Facebook.ajax.likes',$data);
        return view('circle-layout.Facebook.post_detail',$data);
    }
}
