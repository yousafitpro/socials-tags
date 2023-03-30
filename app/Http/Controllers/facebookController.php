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
        $fb->access_token=$request->user_acccess_token;
        $fb->user_id=$request->user_id;
        $fb->page_id=$request->page_id;
        $fb->page_name=$request->page_name;
        $fb->page_access_token=$request->page_access_token;
        $fb->save();
        dd($fb);
    }
}
