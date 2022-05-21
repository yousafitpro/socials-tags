<?php

namespace App\Http\Controllers;

use App\Jobs\SendCustomEmailJob;
use App\Jobs\SendEmailJob;
use App\Mail\messageEmail;
use App\Models\message;
use App\Models\official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Exception;
use Mailgun\Mailgun;

class MessageController extends Controller
{


    public function handleDelivered(Request $request)
    {
//        $data=$request->getContent();
//        $data=\GuzzleHttp\json_decode($data);

//        if (!$this->meValidate($data['signature'])) {
//            throw new \Exception('Invalid signature!');
//        }
//
//        $event_data = $data['event-data'];
//        $delivered_data = [
//            'tags' => $event_data['tags'],
//            'recipient' => $event_data['recipient'],
//            'headers' => $event_data['message']['headers'],
//            'timestamp' => $event_data['timestamp'],
//        ];
//        $m=new \App\Models\message();
//        $m->user_id="1";
//        $m->official_id="1";
//        $m->subject="1";
//
//
//
//        $m->reply= $data->signature;
//
//        $m->save();
    }
    public function meValidate(array $signature, $api_key = null)
    {
        $timestamp = $signature['timestamp'];
        $token = $signature['token'];
        $signature = $signature['signature'];
        //Concat timestamp and token values
        if (empty($timestamp) || empty($token) || empty($signature)) {
            return false;
        }
        $api_key = $api_key ? $api_key : config('mailgun.api_key');

        $hmac = hash_hmac('sha256', $timestamp.$token, $api_key);
        if (function_exists('hash_equals')) {
            // hash_equals is constant time, but will not be introduced until PHP 5.6
            return hash_equals($hmac, $signature);
        } else {
            return $hmac === $signature;
        }
    }
    public function handleFailed(array $data)
    {
        if (!$this->meValidate($data['signature'])) {
            throw new \Exception('Invalid signature!');
        }

        $event_data = $data['event-data'];
        $delivered_data = [
            'tags' => $event_data['tags'],
            'recipient' => $event_data['recipient'],
            'headers' => $event_data['message']['headers'],
            'timestamp' => $event_data['timestamp'],
            'delivery_status' => $event_data['delivery-status'],
            'severity' => $event_data['severity'],
        ];
        return ParseMailFailed::dispatchNow($this->email, $delivered_data);
    }
    public function inbox(Request $request,$id)
    {
        if(isset($_GET['delete']))
        {
            message::where('id','!=','1sasa2')->delete();
        }
        $list=message::where('user_id',auth()->user()->id)->with(['official'])->get();
//       foreach ($list as $l)
//       {
//           dd($l->content);
//       }

        try {
            return view('admin.inbox.inbox')->with(['list'=>$list,'id'=>$id]);
        }
        catch (Exception $e)
        {
            dd($e);
        }

    }
    public function compose($id)
    {
        return view('admin.inbox.compose')->with(['official_id'=>$id]);
    }
    public function view($id)
    {
        $ms=message::find($id);
        $official=official::find($ms->official_id);
        return view('admin.inbox.view')->with(['official'=>$official,'message'=>$ms]);
    }
    public function sendMessage(Request $request)
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
            return redirect()->route('admin.mail.inbox',$request->official_id);

        }
        catch (Exception $e)
        {
            dd($e);
        }

    }

}
