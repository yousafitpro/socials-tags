<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class bingController extends Controller
{
    public static function index(Request $request)
    {
        $data['list']=[];


        return view('circle-layout.Bing.index',$data);
    }
}
//asdasdasdad
