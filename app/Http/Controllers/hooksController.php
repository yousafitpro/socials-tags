<?php

namespace App\Http\Controllers;


use App\Models\PaidBill;
use App\Models\telpaysentBill;
use App\Models\User;
use App\Notifications\billPaymentStartedUsingWallet;
use App\Notifications\BillsSentToTelpay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class hooksController extends Controller
{
    public function loginAndRedirect(Request $request)
    {

        $request->validate([
            'redirectUrl'=>'required',
            'username'=>'required',
            'password'=>'required'
        ]);
        $credentials = [
            'email' => $request['username'],
            'password' => $request['password'],
        ];

        if (Auth::attempt($credentials)) {
            return redirect($request->redirectUrl.'?is_from_login='.$request->is_from_login);
        }
   abort(401);
        return redirect($request->redirectUrl);
    }

}
