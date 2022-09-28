<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class iframeController extends Controller
{
    public function iframe()
    {
        return view('iframe.iframe');
    }
}
