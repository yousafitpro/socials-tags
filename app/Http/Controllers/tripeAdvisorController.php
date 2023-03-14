<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class tripeAdvisorController extends Controller
{
    public static function search(Request $request)
    {
        $data['list']=[];
        print_r($_SERVER);
        if($request->has('searchKeywords') && $request->searchKeywords)
        {
           $req=Http::get('https://api.content.tripadvisor.com/api/v1/location/search?key=68A4811971BC462ABE1FC84460F5AD9A&searchQuery=f&language=en');
           dd($req->json());
        }

        return view('circle-layout.tripeAdvisor.index',$data);
    }
}
