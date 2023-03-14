<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {

        return view('circle-layout.setting.index');
    }
    public function calendar(Request $request)
    {

        return view('circle-layout.setting.calendar');
    }
}
