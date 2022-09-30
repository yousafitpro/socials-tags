<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class iframeController extends Controller
{
    public function iframe()
    {

        $data['posts']=post::where('id','!=','sdadas')->inRandomOrder()->get();
        foreach ($data['posts'] as $p)
        {
          $p->image_url=asset($p->image);
          $p->created_at_readable=\Carbon\Carbon::parse($p->created_at)->diffForhumans();
        }
       if (Request::capture()->expectsJson())
       {
           return response()->json($data);
       }
        return view('iframe.iframe',$data);
    }
}
