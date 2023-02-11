<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Env;
use App\Models\ligiscansession;
use App\Models\moniteredbill;
use App\Models\role;
use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class LigiscanController extends Controller
{
   // ajax functions

//asdsadasdasd
    // web functions
    public function settings()
    {
        return view('admin.Ligiscan.setting');
    }
    public function update_sessions()
    {
        $response = Http::get('https://api.legiscan.com/?key='.Env::Ligiscan_Key().'&op=getSessionList&state=MD');
      $response=$response->json();

      ligiscansession::where('id','!=',"me")->delete();
    foreach ($response['sessions'] as $s)
    {
     $ns=new ligiscansession();
     $ns->session_id=$s['session_id'];
        $ns->state_id=$s['state_id'];
        $ns->year_start=$s['year_start'];
        $ns->year_end=$s['year_end'];
        $ns->name=$s['name'];
     $ns->save();
    }
        Session::put('success-msg',"Sessions Successfully Updated");
       return \redirect()->back();
    }
    public function get_sessions(Request $request)
    {
        $response = Http::get('https://api.legiscan.com/?key='.Env::Ligiscan_Key().'&op=getSessionList&state='.$request->id);
        $response=$response->json();
       return response()->json(['sessions'=>$response['sessions']],200);
    }
    public function search()
    {
        $states=state::all();
        return view('admin.Ligiscan.search')->with(['check'=>'0','states'=>$states,'billNum'=>'','searchText'=>'']);
    }
    public function searchPost(Request $request)
    {
        $states=state::all();


            $billresponse = Http::get('https://api.legiscan.com/?key='.Env::Ligiscan_Key().'&state='.$request->state.'&op=search&bill='.$request->billNum);
            $billresponse=$billresponse->json();

            if(count($billresponse['searchresult'])>1)
            {
                $i=1;
                foreach ($billresponse['searchresult'] as $b)
                {

                    if($i>1)
                    {
                        if($b['bill_number']==$request->billNum)
                        {
                            return \redirect(route('ligiscan.billDetail',$b['bill_id']));
                        }
                    }
                    $i++;
                }

                return view('admin.Ligiscan.search')->with(['check'=>'1','states'=>$states,'list'=>$billresponse['searchresult'],'billNum'=>$request->billNum,'searchText'=>$request->searchText]);

            }


            $response = Http::get('https://api.legiscan.com/?key='.Env::Ligiscan_Key().'&op=search&state='.$request->state.'&query='.$request->searchText.'&year='.$request->ssession);
            $response=$response->json();


            return view('admin.Ligiscan.search')->with(['check'=>'1','states'=>$states,'list'=>$response['searchresult'],'billNum'=>$request->billNum,'searchText'=>$request->searchText]);




    }

    public function addToMoniteredBill(Request $request)
    {
        if(moniteredbill::where("bill_number",$request->id)->where('user_id',\auth()->user()->id)->exists())
        {
            return response()->json(['message'=>'Bill already existed']);
        }
        $mb=new moniteredbill();
        $mb->bill_number=$request->id;
        $mb->title=$request->title;
        $mb->state=$request->state;
        $mb->bill_id=$request->id1;
        if($mb->save())
        {
           return response()->json(['message'=>'Bill successfully added']);
        }
    }
    public function moniteredBills()
    {
    $bills=moniteredbill::where('user_id',\auth()->user()->id)->get();
    return view('admin.Ligiscan.moniteredBills')->with(['bills'=>$bills]);
    }
    public function billDetail(Request $request,$id)
    {
        $response = Http::get('https://api.legiscan.com/?key='.Env::Ligiscan_Key().'&op=getBill&id='.$id);
        $response=$response->json();

//        $bill=moniteredbill::where('bill_number',$id)->first();
        return view('admin.Ligiscan.billDetail')->with(['bill'=>$response['bill']]);
    }
    public function addStateView(Request $request)
    {
   return view('admin.Ligiscan.addState');
    }
    public function addState(Request $request)
    {
        $ns=new state();
        $ns->state_id=$ns->id;
        $ns->state_abbr=$request->state_abbr;
        $ns->state_name=$request->state_name;
        if($ns->save())
        {
            Session::put('success-msg','State successfully Added');
        }

        return \redirect()->back();
    }
    public function deleteState($id)
    {
     if(state::find($id)->delete())
     {
         Session::put('success-msg','Region Successfully Deleted');
         return \redirect()->back();
     }
    }
    public function showStates()
    {
            $states=state::where('user_id',Auth::user()->id)->get();
            return view('admin.Ligiscan.regions')->with(['regions'=>$states]);
    }
    public function getPerson($id)
    {
        $response = Http::get('https://api.legiscan.com/?key='.Env::Ligiscan_Key().'&op=getPerson&id=22879');
        $response=$response->json();

        return view('admin.Ligiscan.getPerson')->with(['person'=>$response['person']]);
    }
}
