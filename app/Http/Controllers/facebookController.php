<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class facebookController extends Controller
{
    public static function index(Request $request)
    {
        $data['list']=[];
        return view('circle-layout.Facebook.index',$data);
    }
}