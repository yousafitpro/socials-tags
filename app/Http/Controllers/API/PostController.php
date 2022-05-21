<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Env;
use App\Jobs\SendCustomEmailJob;
use App\Mail\messageEmail;
use App\Models\message;
use App\Models\official;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Exception;

class PostController extends Controller
{
    protected $src="src/post/files";


    public function add(Request $request)
    {

        $data['user_name']=auth()->user()->fname.' '.auth()->user()->lname;
        $data['user_image']=asset(\auth()->user()->profile_image);
        $validator = Validator::make($request->all(), [
            'title'=>'required',
        ]);

        if ($validator->fails())
        {
            return Redirect::route('admin.post.add')->withErrors($validator)->withInput();
        }

        if (!$request->hasFile('image') && !$request->hasFile('video') && $request->contentdata==""  )
        {
            Session::put('error-msg','You must add at least one of the following fields to the body: text, image or video');
            return \redirect()->back();
        }


        $post=new post();
        $post->title=$request->title;
        $post->link=$request->link;
        $post->content=$request->contentdata;
        $post->save();

        if($request->hasFile('image'))
        {

            $validator = Validator::make($request->all(), [
                'image'=>'required|mimes:jpeg,png,jpg | max:10000',
            ]);

            if ($validator->fails())
            {

                $post->delete();
                return Redirect::route('admin.post.add')->withErrors($validator)->withInput();
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->delete($post->image);

            $path = $request->file('image')->storeAs($this->src,'image'.$post->id.'.'.$extension);

            $post->image= $path;
            $data['image']=asset($path);
            $post->save();
        }

        if($request->hasFile('video'))
        {
            $validator = Validator::make($request->all(), [
                'video'=>'required|mimes:mp4,mov,ogg,qt | max:10000',
            ]);

            if ($validator->fails())
            {

                $post->delete();
                return Redirect::route('admin.post.add')->withErrors($validator)->withInput()->withInput();
            }
            $file = $request->file('video');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->delete($post->video);
            $path = $request->file('video')->storeAs($this->src,'video'.$post->id.'.'.$extension);

            $post->video= $path;
            $data['video']=asset($path);
            $post->save();
        }

        if ($request->contentdata!="")
        {
            $data['text']=$request->contentdata;
        }
        if ($request->contentdata!="")
        {
            $data['link']=$request->link;
        }


        $response=Http::post('https://api.walls.io/v1/posts?access_token='.Config::get('myconfig.Walls.key'),$data);

        $response=$response->json();
        if ($response==null)
        {
            Session::put('error-msg','Sorry Post Cannot be created');
            Storage::disk('public')->delete($post->image);
            Storage::disk('public')->delete($post->video);
            $post->delete();
            return \redirect()->back();
        }

        $post->external_post_id=$response['data']['result']['id'];
        $post->save();

        Session::put('success-msg','Post Successfully Added');

        return response()->json(['message'=>"Post Successfully Created"]);
    }
    public function composemessage(Request $request)
    {

        $official=official::find($request->official_id);
        $ms=new message();
        $ms->official_id=$request->official_id;
        $ms->subject=$request->subject;
        $ms->message=$request->contentdata;
        $ms->save();
        $to=$official->email;
        $attachment=null;
        try {
            if ($request->hasFile("attachment"))
            {
                $file = $request->file('attachment');
                $extension = $file->getClientOriginalExtension();
                $path= $request->file('attachment')->storeAs('documents',$ms->id.'.'.$extension);

                $attachment= asset($path);


            }


            if(Env::isTestMode())
            {
                $to='yousaf.temp@gmail.com';

            }

//          Mail::to($to)->send(new messageEmail(auth()->user()->email,$request->subject,$request->contentdata,$attachment))->onQueue('default');

            dispatch(new SendCustomEmailJob(auth()->user()->email,auth()->user()->fname.' '.auth()->user()->lname,$to,$request->subject,$attachment,'emails.compose',['contentData'=>$request->contentdata,'attachments'=>[$attachment]]));
            return redirect()->route('official.officials');
        }
        catch (Exception $e)
        {
            dd($e);
        }

    }
    public function getAll()
    {
        $posts=post::where('user_id',Auth::user()->id)->with('user')->get();
        return response()->json(['posts'=>$posts]);
    }
    public function getOne($id)
    {
        $post=post::find($id);
        $post->image=asset($post->image);
        $post->video=asset($post->video);
        return response()->json(['post'=>$post]);
    }

}
