<?php

namespace App\Http\Controllers;

use App\Models\dailyroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DailyroomController extends Controller
{

    public function create(Request $request)
    {
//

        if (dailyroom::where('user_id',auth()->user()->id)->where('deleted_at',null)->where('status','created')->exists())
        {

            $mr=dailyroom::where('user_id',auth()->user()->id)->where('deleted_at',null)->where('status','created')->first();
            return view('daily.daily')->with(['room'=>$mr]);
        }
        $res=Http::withToken(config('myconfig.daily.key'))->post(config('myconfig.daily.url').'rooms');

        if ($res->ok())
        {

            $res=$res->json();

         $dr=new dailyroom();
         $dr->user_id=auth()->user()->id;
         $dr->url=$res['url'];
            $dr->room_id=$res['id'];
            $dr->name=$res['name'];
         $dr->save();
            if (Request::capture()->expectsJson())
            {
                return response()->json(['code'=>'200','data'=>$dr]);
            }

            return view('daily.daily')->with(['room'=>$dr]);

        }
        else
        {
            return response()->json(['data'=>$res->json()]);
        }

    }
    public function delete($name)
    {

        dailyroom::where('name',$name)->delete();
        $res=Http::withToken(config('myconfig.daily.key'))->delete(config('myconfig.daily.url').'rooms/'.$name);

        if ($res->ok())
        {
            return redirect('https://www.google.com/');
        }
        else
        {
            return response()->json(['data'=>$res->json()]);
        }
    }
}
