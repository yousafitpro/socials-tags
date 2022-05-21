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

class regulationsGovController extends Controller
{
    public function searchView(Request $request)
    {
        return view('admin.regulationsgov.search')->with(['check'=>'0','keywords'=>'']);
    }
    public function search(Request $request)
    {
        $response = Http::get('https://api.regulations.gov/v4/documents?filter[searchTerm]='.$request->keywords.'&api_key='.Env::Regulatinsgov_Key().'&page[size]=250');

        $response=$response->json();
//        dd($response['data']);
//        dd($response['response']['results']['candidates'][0]['officials']);

        $r=$response['data'];

        return view('admin.regulationsgov.search')->with(['check'=>'1','list'=>$r,'keywords'=>$request->keywords]);
    }
    public function detail(Request $request,$id,$obid)
    {




        $response = Http::get('https://api.regulations.gov/v4/documents/'.$id.'?api_key='.Env::Regulatinsgov_Key().'');

        $comments = Http::get('https://api.regulations.gov/v4/comments?filter[commentOnId]='.$obid.'&api_key='.Env::Regulatinsgov_Key());
//       dd($comments->json());
        $comments=$comments->json();

        $data=$response->json();
//dd($data);
        return view('admin.regulationsgov.detail')->with(['check'=>'1','data'=>$data['data'],'obid'=>$obid,'comments'=>$comments['data']]);
    }
    public function getCommentDetail(Request $request)
    {

        $response = Http::get('https://api.regulations.gov/v4/comments/'.$request->id.'?api_key='.Env::Regulatinsgov_Key());
        $response=$response->json();

       echo "
       <p>{$response['data']['attributes']['comment']}</p>
       ";
    }
    public function postComment(Request $request)
    {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={k}&key=".Env::GoogleMap_Key();
        $response= Http::get($url);
        dd($response);
        $response= Http::post('https://api.regulations.gov/v4/comments {
  "data": {
    "attributes": {
      "commentOnDocumentId":"FDA-2009-N-0501-0012",
      "comment":"test comment",
      "submissionType":"API",
      "submitterType":"ANONYMOUS"
    },
    "type":"comments"
  }
}?api_key='.Env::Regulatinsgov_Key());
        $response=$response->json();
        dd($response);
    }
}
