<?php

namespace App\Jobs;

use App\Models\post;
use App\Models\socialConnect;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class createInstagramPost
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $post=null;
    public $photo_path=null;
    public function __construct($post,$photo_path)
    {
        $this->post=$post;
        $this->photo_path=$photo_path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $post=post::find($this->post->id);
        $url='';
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>$post->user_id])->first();

        if ($this->photo_path) {
            $url=config('myconfig.FB.ApiUrl').'/v16.0/'.$fb->insta_id.'/media?';
            $url=$url.'image_url='.$this->photo_path;
            $url=$url.'&message='.$post->post_content;

        }
//        else{
//            $url=config('myconfig.FB.ApiUrl').'/'.$fb->page_id.'/feed?';
//            $url=$url.'message='.$post->post_content;
//        }


        $url=$url.'&access_token='.$fb->page_access_token;

        if($post->link && $post->link!=null || $post->link!='')
        {
            $url=$url.'&link='.$post->link;
        }

        $http=Http::post($url,[]);

        if($http->status()=='200')
        {
            $http=$http->json();
            $url=config('myconfig.FB.ApiUrl').'/v16.0/'.$fb->insta_id.'/media_publish?';
            $url=$url.'access_token='.$fb->page_access_token;
            $url=$url.'&creation_id='.$http['id'];
            $http=Http::post($url,[]);

            if($http->status()=='200')
            {
                $is_posted=true;
                $http=$http->json();

                $post->instagram_post_id=$http['id'];
                $post->save();
                dd($post);

            }

        }else
        {
//            dd($http->json());
        }
    }
}
