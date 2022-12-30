<?php

namespace App\Http\Controllers;

use App\Models\paypalPayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class paypalController extends Controller
{
    public function complete_payment(Request $request,$plan)
    {
        $amount=39.99;
        if($plan=='month')
        {
            $amount=4.99;
        }
        if($plan=='year')
        {
            $amount=39.99;
        }
        return view('paypal.complete_payment',['amount'=>$amount,'plan'=>$plan]);
    }
    public function payments(Request $request)
    {
        $data['list']=paypalPayment::query()->latest('created_at')->with('user')->get();
        return view('paypal.payments',$data);
    }
    public function init_payment(Request $request)
    {
        $data=$request->except('_token');
        $data['user_id']=auth()->user()->id;
        $payment=paypalPayment::create($data);
        if ($request->status=='COMPLETED')
        {
            $user=User::find(auth()->user()->id);
            if($request->plan=='year')
            {

                $user->valid_till=Carbon::now()->addYear()->timezone(Config::get('app.timezone'))->format('Y-m-d');
            }
            if($request->plan=='month')
            {

                $user->valid_till=Carbon::now()->addMonth()->timezone(Config::get('app.timezone'))->format('Y-m-d');
            }
            $user->save();
        }
        return response()->json(['code'=>0,'message'=>'Transaction Successfully Started']);
    }
}
