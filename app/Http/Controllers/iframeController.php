<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class iframeController extends Controller
{
    public function iframe()
    {
        $data['posts']=post::all();
        return view('iframe.iframe',$data);
    }
}
