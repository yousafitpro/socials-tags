<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Env;
use App\Models\official;
use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class officialController extends Controller
{

    // ajax functions


    // web functions
    public function settings()
    {
        return view('admin.Ligiscan.setting');
    }

    public function search()
    {

        return view('admin.official.search')->with(['check'=>'0']);
    }

    public function addStateView(Request $request)
    {
        return view('admin.ligiscan.addState');
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
        return view('admin.ligiscan.regions')->with(['regions'=>$states]);
    }
    public function getPerson($id)
    {
        $response = Http::get('https://api.legiscan.com/?key=650d8e4f930d5e3f3c832080267f93ff&op=getPerson&id=22879');
        $response=$response->json();

        return view('admin.Ligiscan.getPerson')->with(['person'=>$response['person']]);
    }
    public function loadlocations(Request $request)
    {
        $url = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=".$request->searchText."&key=".Env::GoogleMap_Key();


        $response= Http::get($url);

        $response=$response->json();
      return response()->json(['list'=>$response['results']]);

    }
    public function loadOfficials(Request $request)
    {

        $url = "https://cicero.azavea.com/v3.1/official?lat=".$request->lat."&lon=".$request->lng."&key=".Env::Official_Key()."&max=200";
        $response= Http::get($url);
        $response=$response->json();
        return response()->json(['list'=>$response['response']['results']['officials']]);
//        return view('admin.official.officialslist')->with(['officiallist'=>$response['response']['results']['officials'],'lat'=>$request->lat,'lng'=>$request->lng]);
    }
    public function officials(Request $request)
    {
        $os=official::where('user_id',auth('api')->user()->id)->get();
        return response()->json(['list'=>$os]);
    }
    public function saveOfficial(Request $request)
    {
        if (official::where('o_id',$request->id)->exists())
        {
            $of=official::where('o_id',$request->id)->first();
        }
        else
        {
            $of=new official();
            $of->o_id=$request->id;
        }


        $of->name=$request->name;
        $of->post=$request->post;
        $of->state=$request->state;
        $of->web=$request->web;
        $of->email=$request->email;
        $of->address=$request->address;
        $of->image=$request->image;
        $of->save();
        return response()->json(['message'=>"Successfully Saved"]);
    }
}
