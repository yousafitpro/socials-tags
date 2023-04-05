<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\socialConnect;
use App\Models\User;
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
//asdasdasd
       if($request->has('facebook') && socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->where('page_access_token','!=',null)->exists())
       {
           $url='';
           $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();

           if ($photo) {
               $url=config('myconfig.FB.ApiUrl').'/'.$fb->page_id.'/photos?';
               $url=$url.'url='.$photo_path;
               $url=$url.'&message='.$request->post_content;

           }else{
               $url=config('myconfig.FB.ApiUrl').'/'.$fb->page_id.'/feed?';
               $url=$url.'message='.$request->post_content;
           }


           $url=$url.'&access_token='.$fb->page_access_token;

              if($request->link && $request->link!=null || $request->link!='')
              {
                  $url=$url.'&link='.$request->link;
              }

              $http=Http::post($url,[]);
              if($http->status()=='200')
              {
                  $is_posted=true;
                  $http=$http->json();
                  $post->facebook_post_id=$http['id'];
                  $post->save();
              }else
              {
                  dd($http->json());
              }

       }
       if($is_posted)
       {
           return redirect()->back()->with([
               'toast' => [
                   'heading' => 'Success!',
                   'message' => 'Post Successfully Created',
                   'type' => 'success',
               ]
           ]);
       }
       else{

           $post->delete();
           return redirect()->back()->with([
               'toast' => [
                   'heading' => 'Success!',
                   'message' => 'Post cannot be posted',
                   'type' => 'danger',
               ]
           ]);
       }
    }
}
