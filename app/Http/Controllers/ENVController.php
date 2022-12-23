<?php

namespace App\Http\Controllers;

use App\Events\newuserRegistered;
use App\Helper\myHelper;
use App\Models\etransfer;
use App\Models\sendandrequestfund;
use App\Models\User;
use App\Models\userNote;
use App\Models\UserSetting;
use App\Models\VCQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ENVController extends Controller
{

    public static $sqaure_url='';
    //verification@zpayd.com
    public static $redeiving_query_replies_mail='verification@zpayd.com';
    public static $default_currency='CAD';
    public static $access_token='';
    public static function notificationTypes()
    {
        return [0=>[
            'name'=>'new_bill_added',
            'title'=>'New Bill Added ?'
        ],
            1=>[
                'name'=>'new_accounting_service_added',
                'title'=>'New Service has been linked ?'
            ],
            2=>[
                'name'=>'two_step_verification',
                'title'=>'Two Step Verification ?'
            ]];
    }
    public static $maxBillAmountLimit=2000;
    public static function beforeLogin($user)
    {

//        if ($user->wallet_balance=='0' || $user->wallet_balance==null)
//        {
//            $user2=User::find($user->id);
//            $user2->wallet_balance=encrypt(0);
//            $user2->save();
//
//        }

//        if ($user->business_name==null)
//        {
//            $user->business_name=str_random(20);
//            $user->save();
//        }
        if (!UserSetting::where(['user_id'=>$user->id])->exists())
        {
            UserSetting::create(['user_id'=>$user->id]);
        }
//        if (!userNote::where(['user_id'=>$user->id])->exists())
//        {
//            userNote::create(['user_id'=>$user->id]);
//        }
//        if (!etransfer::where(['user_id'=>$user->id])->exists())
//        {
//            $uername=myHelper::createSimpleString($user->name);
//            $uername=$uername.$user->id.'@etransfer-zpayd.com';
//            etransfer::create([
//                'user_id'=>$user->id,
//                'security_question'=>"Question-".$user->id,
//                'unique_id'=>uniqid('user'),
//                'username'=>$uername
//            ]);
//        }
//       self::RegisterUserOnSqaure($user);
//
//        if ($user->aptpay_identity==null)
//        {
//            aptPayController::registerOnLogin($user);
//        }

//        railzController::getToken($user);
//        functionsController::createUserNotifications($user);
    }
    public static function RegisterUserOnSqaure($user)
    {
        if ($user->sqaure_customer_id==null)
        {
            $req= Http::withToken(ENVController::$access_token)->post(ENVController::$sqaure_url.'/v2/customers',[
                'idempotency_key'=>str_random(20),
                "given_name"=> $user->name,
                "family_name"=> $user->name,
                "company_name"=> $user->name,
                "nickname"=> $user->name,
                "email_address"=>$user->email,
//                "phone_number"=> null,
                "reference_id"=> 'u'.$user->id,
                "note"=> "A New User",
                "birthday"=> "2008-03-05T00:00:00-00:00"
            ]);


            if ($req->status()=='200')
            {
                $req=$req->json();

                $user->sqaure_customer_id=$req['customer']['id'];
                $user->save();
            }
        }

    }
    public static function afterRegisterUser($user)
    {

        //sdadasd
        sendandrequestfund::where(['receiver_username'=>$user->email,'receiver_id'=>0])->update([
            'receiver_username'=>null,
            'receiver_id'=>$user->id
        ]);
        $data['user']=$user;
        $query=new VCQuery();
        $query->user_id=$user->id;
        $query->title="Please complete verification for full Zpayd Access. Driver's license is required. ";
        $query->type='file';
        $query->short_detail="Please Upload Driver's license front and back. Image should show full object including image borderline. Zip both images and upload as attachment.";
        $query->save();
        event(new newuserRegistered($data));
    }
//asdasd
}
