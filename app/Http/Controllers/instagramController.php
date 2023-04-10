<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class instagramController extends Controller
{
    public static function index(Request $request)
    {
        $data['list']=[];
////asdasd
        return view('circle-layout.Instagram.index',$data);
    }
}
