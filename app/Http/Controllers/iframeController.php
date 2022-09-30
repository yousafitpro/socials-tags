<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class iframeController extends Controller
{
    public function iframe()
    {
        $data['posts']=post::where('id','!=','sdadas')->inRandomOrder()->get();
        return view('iframe.iframe',$data);
    }
}
