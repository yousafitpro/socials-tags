<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DailyroomController extends Controller
{

    public function create(Request $request)
    {

        $res=Http::withToken(config('myconfig.daily.key'))->post(config('myconfig.daily.url').'rooms');

        if ($res->ok())
        {
            return response()->json(['code'=>'200','data'=>$res->json()]);
        }
    }
    public function delete($name)
    {
        $res=Http::withToken(config('myconfig.daily.key'))->delete(config('myconfig.daily.url').'rooms/'.$name);

        if ($res->ok())
        {
            return response()->json(['code'=>'200','data'=>$res->json()]);
        }
    }
}
