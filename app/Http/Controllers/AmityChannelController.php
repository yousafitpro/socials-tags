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

        $users=explode('_',$request->channel_id);
        $newId=$users[1].'_'.$users[0];

        $channel=null;
        $data=$request->except(['token']);
        $data['user_id']=auth()->user()->id;
        if (amityChannel::where('channel_id',$request->channel_id)->exists()) {
            $data['user_id']=auth()->user()->id;
            amityChannel::where('channel_id', $request->channel_id)->where('user_id',auth()->user()->id)->update($data);
            $channel=amityChannel::where('channel_id', $request->channel_id)->first();
        }
        else
        {
            if (amityChannel::where('channel_id',$newId)->exists())
            {
                $c=amityChannel::where('channel_id',$newId)->where('user_id',auth()->user()->id)->first();
                if (amityChannel::where('channel_id',$newId)->where('user_id',auth()->user()->id)->exists())
                {
                    $channel=$c;
                }else
                {
                    $data['channel_id']=$newId;
                    $channel=amityChannel::create($data);
                }

            }else
            {
                $channel=amityChannel::create($data);
            }

        }
//        $channel=amityChannel::where('channel_id', $request->channel_id)->first();
        return response()->json(['message' => "Channel Update",'data'=>$channel]);



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
        foreach ($list as $i)
        {

        }
        if (Request::capture()->expectsJson())
        {
            return response()->json(['list'=>$list]);
        }
    }
    public function allUsers(Request $request)
    {
        $list=User::where('id','!=','121')->where('id','!=',auth()->user()->id)->get();

        if (Request::capture()->expectsJson())
        {
            return response()->json(['list'=>$list]);
        }
    }
}
