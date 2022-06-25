<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class userController extends Controller
{
    public function amity_random_users(Request $request)
    {
        $q=User::where('amity_user_id','!=',null)->where('id','!=',\auth()->id())->inRandomOrder();
        if ($request->has('count'))
        {
            $q= $q->limit($request->count);
        }
            $data['list']=$q->get();




        return response()->json($data);
    }

    public function set_amity_id(Request $request)
    {
        $user=User::find(\auth()->user()->id);
        $user->amity_user_id=$request->amity_user_id;
        $user->save();
        return response()->json(['message'=>"Successfully saved"]);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showProfile()
    {
        $user=Auth::user();
        return view('pages.user.update-profile')->with('user',$user);
    }
    public function updateProfile(Request $request)
    {
      $user=User::find(Auth::user()->id);
      $user->fname=$request->fname;
      $user->lname=$request->lname;
      $user->phone=$request->phone;
      $user->address=$request->address;
//        $user->password=bcrypt($request->password);
        Session::put('success-msg',"Profile Successfully Updated.");
        $user->save();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            Storage::disk('public')->delete($user->profile_image);
            $path = $request->file('image')->storeAs('profileimages',$user->id.'.'.$extension);

            $user->profile_image= $path;

            $user->save();
        }
        return view('pages.user.update-profile')->with('user',$user);

    }
    public function resetPassword(Request $request)
    {
        $user=User::find(Auth::user()->id);
        $user->password=bcrypt($request->password);
        Session::put('success-msg',"Password Successfully Updated.");
        $user->save();
        return view('pages.user.update-profile')->with('user',$user);
    }
    public function addView()
    {
        $roles=role::where('user_id',Auth::user()->id)->get();
        return view('admin.user.add')->with(['roles'=>$roles]);
    }
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|unique:users',
            'fname'=>'required',
            'lname'=>'required',
            'role_id'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'password'=>'required'
        ],[
            'fname.required'=>'First Name is Required',
            'lname.required'=>'Last Name is Required',
        ]);

        if ($validator->fails())
        {
            return Redirect::route('admin.user.add')->withErrors($validator);
        }

          $user=new User();
          $user->fname=$request->fname;
          $user->lname=$request->lname;
          $user->email=$request->email;
          $user->phone=$request->phone;
          $user->role_id=$request->role_id;
          $user->type="user";
          $user->status='0';
          $user->address=$request->address;
        $user->addedby_id=Auth::user()->id;
          $user->password=bcrypt($request->password);
          if($user->save())
          {
              if($request->hasFile('image'))
              {
                  $file = $request->file('image');
                  $extension = $file->getClientOriginalExtension();
                  Storage::disk('public')->delete($user->profile_image);
                  $path = $request->file('image')->storeAs('profileimages',$user->id.'.'.$extension);

                  $user->profile_image= $path;

                  $user->save();
              }
              Session::put('success-msg',"User Successfully Added");
          }
         return redirect(route('admin.user.add'));
    }
    public function deleteOne($id)
    {
        $user=User::find($id);
        if($user->delete())
        {
            Session::put('success-msg',"User Successfully Deleted");
        }
        return redirect(route('admin.user.getAll'));
    }
    public function getOne($id)
    {
        $user=User::where('id',$id)->with('role')->first();
        $roles=role::where('user_id',Auth::user()->id)->get();
        return view('admin.user.update')->with(['user'=>$user,'roles'=>$roles]);
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'fname'=>'required',
            'lname'=>'required',
            'address'=>'required',
            'phone'=>'required',
        ],[
            'fname.required'=>'First Name is Required',
            'lname.required'=>'Last Name is Required',
        ]);

        if ($validator->fails())
        {
            return Redirect::route('admin.user.add')->withErrors($validator);
        }
        $user=User::find($id);
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->phone=$request->phone;
        $user->role_id=$request->role_id;
        $user->address=$request->address;
        if($request->has('password') && $request->password!="")
        {
            $user->password=bcrypt($request->password);
        }

        if($user->save())
        {
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('public')->delete($user->profile_image);
                $path = $request->file('image')->storeAs('profileimages',$user->id.'.'.$extension);

                $user->profile_image= $path;

                $user->save();
            }
            Session::put('success-msg',"User Successfully Updated");
        }
        return redirect(route('admin.user.getAll'));
    }
    public function active($id)
    {
        $user=user::find($id);
        $user->status="1";
        if($user->save())
        {
            Session::put('success-msg',"User Successfully Activated");
        }
        return redirect(route('admin.user.getAll'));
    }
    public function unActive($id)
    {
        $user=user::find($id);
        $user->status="0";
        if($user->save())
        {
            Session::put('success-msg',"User Successfully Deactivated");
        }
        return redirect(route('admin.user.getAll'));
    }
    public function getAll()
    {
       $users=User::where('id','!=',Auth::user()->id)->where('addedby_id',Auth::user()->id)->with('role')->get();
       return view('admin.user.all')->with('users',$users);
    }
    public function get_user($id)
    {
        $user=User::where('id',$id)->orWhere('amity_user_id',$id)->first();
        return response()->json($user);
    }
}
