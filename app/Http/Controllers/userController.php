<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public $SRC = 'profileimages/';
    public function index(Request $request)
    {
        $data['list']=User::query()->where('id','!=',auth()->id())->latest()->get();
        return view('circle-layout.users.index',$data);
    }

    public function add(Request $request)
    {

        return view('circle-layout.users.add');
    }
    public function edit(Request $request,$id)
    {

        $data['user']=User::find(app_decrypt($id));
        return view('circle-layout.users.edit',$data);
    }
    public function create(Request $request)
    {

        $profile_image='';
        $image = $request->file('photo');
        if ($image) {
            $profile_image = saveImage($image, $this->SRC);
        }
        $request->validate([
            'email'=>'required|unique:users',
            'password'=>'required|same:confirm'
        ]);

        $user=new user();
        $user->profile_image=$profile_image;
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect(url('Users'))
            ->with([
                'toast' => [
                    'heading' => 'Message',
                    'message' => $request->lname . ' successfully Registered',
                    'type' => 'success',
                ]
            ]);
    }
    public function update(Request $request,$id)
    {

        $profile_image='';
        $image = $request->file('photo');
        $user=User::find(app_decrypt($id));
        if ($image) {
            $profile_image = saveImage($image, $this->SRC);
            $user->profile_image=$profile_image;
            $user->save();
        }




        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->save();
        return redirect(url('Users'))
            ->with([
                'toast' => [
                    'heading' => 'Message',
                    'message' => $request->lname . ' successfully Updated',
                    'type' => 'success',
                ]
            ]);
    }
    public function update_password(Request $request,$id)
    {


        $user=User::find(app_decrypt($id));

        $user->password=bcrypt($request->password);
        $user->save();
        return redirect(url('Users'))
            ->with([
                'toast' => [
                    'heading' => 'Message',
                    'message' =>'Password Successfully Updated',
                    'type' => 'success',
                ]
            ]);
    }
}
