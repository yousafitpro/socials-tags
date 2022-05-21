<?php

namespace App\Http\Controllers;

use App\Models\amityChannel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AmityChannelController extends Controller
{
    public function create(Request $request)
    {
        $data=$request->except(['token']);
        $data['user_id']=auth()->user()->id;
        if (amityChannel::where('channel_id',$request->channel_id)->exists()) {
            amityChannel::where('channel_id', $request->channel_id)->update($data);
        }
        else
        {
            amityChannel::create($data);
        }
        return response()->json(['message' => "Channel Update",'data'=>amityChannel::where('channel_id', $request->channel_id)->first()]);



    }
    public function update(Request $request,$id)
    {
        $data=$request->except(['token']);
        amityChannel::where('id',$id)->update($data);
        if (Request::capture()->expectsJson())
        {
            return response()->json(['message'=>"Channel Updated"]);
        }
    }
    public function get(Request $request,$id)
    {

        $data=amityChannel::where('id',$id)->first();
        if (Request::capture()->expectsJson())
        {
            return response()->json(['channel'=>$data]);
        }
    }
    public function delete(Request $request,$id)
    {
        $data=$request->except(['token']);
        amityChannel::where('id',$id)->update([
            'deleted_at'=>Carbon::now()->toDateTime()
        ]);
        if (Request::capture()->expectsJson())
        {
            return response()->json(['message'=>"Channel Deleted"]);
        }
    }
    public function list(Request $request)
    {
        $list=amityChannel::where("user_id",auth()->user()->id)->where('deleted_at',null)->get();
        if (Request::capture()->expectsJson())
        {
            return response()->json(['list'=>$list]);
        }
    }
    public function allUsers(Request $request)
    {
        $list=User::where('id','!=','121')->get();

        if (Request::capture()->expectsJson())
        {
            return response()->json(['list'=>$list]);
        }
    }
}
