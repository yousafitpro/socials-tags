<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class googleMyBusinessController extends Controller
{
    public static function index(Request $request)
    {
        $data['list']=[];
        return view('circle-layout.Google-My-Business.index',$data);
    }
}
