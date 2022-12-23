<?php

namespace App\Http\Controllers;


use App\Jobs\autorenewalJob;
use App\Jobs\chargeTrialUserJob;
use App\Models\LocBankAccount;
use App\Models\packageTransaction;
use App\Models\User;
use App\Models\UserSetting;
use App\Notifications\billChargedFromCardInsteadWallet;
use App\Notifications\globalMessage;
use App\Notifications\noBillPaymentMethodFound;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class SubscriptionController extends Controller
{

    public function accept_agreement_now()
    {
        $user=User::find(auth()->user()->id);
        $user->is_agree='true';
        $user->save();
        if(Request::capture()->expectsJson())
        {
            return response()->json(['message'=>"Agreement Accepted"]);
        }
        return redirect('dashboard');
    }
    public function accept_agreement()
    {
               return view('subscription.accept_agreement');
    }
    public function renew_package()
    {
        $data['is_has_pending']=false;
        $u=User::find(auth()->user()->id);
        $us=UserSetting::where("user_id",auth()->user()->id)->first();

        if ($u->valid_till!='renew' && $us->is_membership_expired=='false')
        {
            return redirect('/dashboard');
        }
        $end = \Carbon\Carbon::parse(time_now())->subMinutes(5);
        $start =\Carbon\Carbon::parse(time_now())->subDays(30);
        packageTransaction::where(['user_id'=>auth()->user()->id,'status'=>'Pending'])->whereBetween('created_at',[$start,$end])->update(['status'=>'Canceled']);

        if (packageTransaction::where(['user_id'=>auth()->user()->id])->where('status','Pending')->exists())
        {
            $data['is_has_pending']=true;

        }

        return view('subscription.renew_package',$data);
    }
    public function packages()
    {


        return view('subscription.packages');
    }
    public static function autoRenewPackage()
    {

          $users=User::all();
       foreach ($users as $user)
       {
           $setting=user_setting($user->id);
           if ($user->id!=who_is_admin() && ($user->valid_till<today_date() || $user->valid_till=='renew' || $user->valid_till==null))
           {
                   self::autoRenewAUser($user);
           }
       }

    }
    public static function autoRenewAUser($user)
    {

        $setting=user_setting($user->id);
        if($setting->card_number!=null)
        {
            if($setting->last_paid!=today_date()) {

                $st = UserSetting::find($setting->id);
                $st->last_paid = today_date();
                $st->save();
                $tempData['user'] = $user;

               // autorenewalJob::dispatch($tempData)->delay(Carbon::now()->addSeconds(1));
                autorenewalJob::dispatch($tempData);
            }
        }


}

    public function membership(Request $request)
    {
        return  view('subscription.membership');
    }
    public function cancel_membership(Request $request)
    {
        $pt=packageTransaction::where('user_id',auth()->id())->where('status','Pending')->where('job_id','!=',null)->get();
        if($pt->count()>0)
        {
            foreach ($pt as $p)
            {
                if (DB::table('jobs')->where('id',$p->job_id)->exists())
                {
                    DB::table('jobs')->where('id',$p->job_id)->delete();
                }
                $p->status="Canceled";
                $p->save();


            }

        }
        $ns=user_setting(auth()->id());
        $ns2=UserSetting::find($ns->id);
        $ns2->card_number=null;

        $ns2->save();

        $tempData['user']=auth()->user();
        $tempData['subject']="Membership Canceled";
        $tempData['message']="We are sorry that you have to go. Your Cancellation requested has been processed. We hope to see you again soon.";
        Notification::route('mail',auth()->user()->email)->notify(new globalMessage($tempData));

        return redirect('/dashboard')
            ->with([
                'toast' => [
                    'heading' => 'Message',
                    'message' => 'Membership Successfully Canceled',
                    'type' => 'success',
                ]
            ]);
    }

}
