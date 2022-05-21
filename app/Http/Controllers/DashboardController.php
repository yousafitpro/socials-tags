<?php

namespace App\Http\Controllers;

use App\Models\game;
use App\Models\lottery;
use App\Models\tournament;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth::user()->type=='user')
        {
            return redirect(route('user.showProfile'));
        }
        $data['userCount']=User::all()->count()-1;
        $data['users']=User::where('id','!=',Auth::user()->id)->whereDate('created_at', DB::raw('CURDATE()'))->get();
        return view('pages.index')->with($data);
    }
}
