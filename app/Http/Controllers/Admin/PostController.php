<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    protected $src="src/post/files";

    public function addView()
    {
        return view('admin.post.add');
    }
    public function add(Request $request)
    {





            if (!$request->hasFile('image') && !$request->hasFile('video') && $request->contentdata==""  )
            {
                Session::put('error-msg','You must add at least one of the following fields to the body: text, image or video');
            return \redirect()->back();
            }


        $post=new post();
        $post->link=$request->link;
        $post->title="";
        $post->username=$request->username;
        $post->content=$request->contentdata;
        $post->save();
        if($request->hasFile('image'))
        {
            $validator = Validator::make($request->all(), [
                'image'=>'required|mimes:jpeg,png,jpg | max:10000',
            ]);

            if ($validator->fails())
            {
        ;
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

//        if($request->hasFile('video'))
//        {
//            $validator = Validator::make($request->all(), [
//                'video'=>'required|mimes:mp4,mov,ogg,qt | max:10000',
//            ]);
//
//            if ($validator->fails())
//            {
//
//                $post->delete();
//                return Redirect::route('admin.post.add')->withErrors($validator)->withInput()->withInput();
//            }
//            $file = $request->file('video');
//            $extension = $file->getClientOriginalExtension();
//            Storage::disk('public')->delete($post->video);
//            $path = $request->file('video')->storeAs($this->src,'video'.$post->id.'.'.$extension);
//
//            $post->video= $path;
//            $data['video']=asset($path);
//            $post->save();
//        }



            Session::put('success-msg','Post Successfully Added');

        return redirect(route('admin.post.add'));
    }
    public function getOne($id)
    {
        $post=post::find($id);

        return view('admin.post.update')->with('post',$post);
    }
    public function deleteOne($id)
    {
        $post=post::find($id);
        if($post->delete())
        {
            Session::put('success-msg',"Post Successfully Deleted");
        }
        return redirect(route('admin.post.getAll'));
    }
    public function update(Request $request,$id)
    {

        $data['user_name']=auth()->user()->fname.' '.auth()->user()->lname;
        $data['user_image']=asset(\auth()->user()->profile_image);

        if (!$request->hasFile('image') && !$request->hasFile('video') && $request->contentdata==""  )
        {
            Session::put('error-msg','You must add at least one of the following fields to the body: text, image or video');
            return \redirect()->back();
        }


        $post=post::find($id);
        $post->title="";
        $post->username=$request->username;
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



        Session::put('success-msg','Post Successfully Updated');

        return redirect(route('admin.post.getAll'));
    }
    public function getAll()
    {
        $posts=post::where('user_id',Auth::user()->id)->with('user')->get();
        return view('admin.post.all')->with('posts',$posts);
    }
}
