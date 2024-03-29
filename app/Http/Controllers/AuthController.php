<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users|max:30',
            'password' => 'required',
        ]);
        // if fail
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()],409);
        }
        $admin=new User();
        // creating user
        $admin->addedby_id="1";
        $admin->fname=$request->first_name;
        $admin->lname=$request->last_name;
        $admin->email=$request->email;
        $admin->type="user";
        $admin->password=bcrypt($request->password);

        try {

            $admin->save();
//            mailController::sendMail(Config::get('myconfig.mail.admin_email'),"New User Registered successfully",$request,'emails.admin.newUserSignup');
//            mailController::sendMail($request->email,"Congratulation! successfully registered",$request,'emails.user.signup');
            return response()->json(['msg'=>"You have been Registered Successfully"],200);
        }
        catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()],409);
        }

        ;


    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = Auth::guard('api')->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        return $this->respondWithToken($request->token);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $user=auth('api')->user();
        $user->is_membership_expired=false;

        if (auth('api')->check() && auth('api')->user()->id!=who_is_admin() && (auth('api')->user()->valid_till<today_date() || auth('api')->user()->valid_till=='renew' || auth('api')->user()->valid_till==null))
        {
            // SubscriptionController::autoRenewAUser(auth()->user());
            $user->is_membership_expired=true;
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' =>$user,
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */

}
