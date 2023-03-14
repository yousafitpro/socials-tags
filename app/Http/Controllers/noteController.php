<?php

namespace App\Http\Controllers;

use App\Models\note;
use Illuminate\Http\Request;

class noteController extends Controller
{
    public function index(Request $request)
    {
        $data['list']=note::query()->where('user_id',auth()->user()->id)->get();
        return view('circle-layout.note.index',$data);
    }
}
