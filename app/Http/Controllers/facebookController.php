<?php

namespace App\Http\Controllers;

use App\Models\socialConnect;
use Illuminate\Http\Request;

class facebookController extends Controller
{
    public static function index(Request $request)
    {
        $data['list']=[];

        return view('circle-layout.Facebook.index',$data);
    }
    public function connect_page(Request $request)
    {
        $fb=socialConnect::where(['name'=>'Facebook','user_id'=>auth()->id()])->first();
        $fb->
    }
}
