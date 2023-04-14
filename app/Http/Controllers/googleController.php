<?php

namespace App\Http\Controllers;
//require_once 'vendor/autoload.php';

use App\Models\socialConnect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class googleController extends Controller
{

    private function getClient():\Google_Client
    {
        // load our config.json that contains our credentials for accessing google's api as a json string
        $configJson = public_path('Google/client_secret.json');

        // define an application name
        $applicationName = 'My App';

        // create the client
        $client = new \Google_Client();
        $client->setApplicationName($applicationName);
        $client->setAuthConfig($configJson);
        $client->setAccessType('offline'); // necessary for getting the refresh token
        $client->setApprovalPrompt ('force'); // necessary for getting the refresh token
        // scopes determine what google endpoints we can access. keep it simple for now.
        $client->setScopes(
            [
                \Google\Service\Oauth2::USERINFO_PROFILE,
                \Google\Service\Oauth2::USERINFO_EMAIL,
                \Google\Service\Oauth2::OPENID,
                'https://www.googleapis.com/auth/business.manage',
                'https://www.googleapis.com/auth/plus.business.manage',
                \Google\Service\Drive::DRIVE_METADATA_READONLY // allows reading of google drive metadata
            ]
        );
        ///asdasdasdasdasd
        $client->setIncludeGrantedScopes(true);

        return $client;
    } // getClient
    public function getAuthUrl(Request $request)
    {
        /**
         * Create google client
         */
        $client = $this->getClient();

        /**
         * Generate the url at google we redirect to
         */
        $authUrl = $client->createAuthUrl();

        /**
         * HTTP 200
         */
        return $authUrl;
    } // getAuthUrl
   public function index(Request $request)
   {

       $data['accounts']=[];
       try {
           $url = "https://mybusinessbusinessinformation.googleapis.com/v1/accounts";
           $response = $this->curl( $url );

           $data['accounts'] = $response['accounts'];
       }catch (\Exception $e)
       {

       }

       $data['list']=[];
////asdasd
       return view('circle-layout.Google-My-Business.index',$data);

   }
    public function login(Request $request)
    {

        return redirect($this->getAuthUrl($request));

    }
   public function Login_Call_Back(Request $request)
   {
       /**
        * Get authcode from the query string
        * Url decode if necessary
        */
       $authCode = urldecode($request->input('code'));


       /**
        * Google client
        */
       $client = $this->getClient();

       /**
        * Exchange auth code for access token
        * Note: if we set 'access type' to 'force' and our access is 'offline', we get a refresh token. we want that.
        */
       $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

       /**
        * Set the access token with google. nb json
        */
       $client->setAccessToken($accessToken['access_token']);

       /**
        * Get user's data from google
        */
       $service = new \Google\Service\Oauth2($client);
       $userFromGoogle = $service->userinfo->get();

$ac=null;
if(socialConnect::where(['name'=>'Google','user_id'=>auth()->id()])->exists())
{
 $ac=socialConnect::where(['name'=>'Google','user_id'=>auth()->id()])->first();
}
else{
    $ac=socialConnect::create([
        'name'=>'Google',
        'user_id'=>auth()->id()
    ]);
}
///asdasdassadasdasasdasdasd
$ac->access_token=$accessToken['access_token'];
$ac->userid=$userFromGoogle->id;
$ac->profile_image=$userFromGoogle->picture;
$ac->given_name=$userFromGoogle->givenName.' '.$userFromGoogle->familyName;
$ac->save();
       return redirect(url('My-Google'))->with([
           'toast' => [
               'heading' => 'Success!',
               'message' => 'Account Successfully Connected',
               'type' => 'success',
           ]
       ]);
       /**
        * Select user if already exists
        */
       $user = User::where('provider_name', '=', 'google')
           ->where('provider_id', '=', $userFromGoogle->id)
           ->first();

       /**
        */
       if (!$user) {
           $user = User::create([
               'provider_id' => $userFromGoogle->id,
               'provider_name' => 'google',
               'google_access_token_json' => json_encode($accessToken),
               'name' => $userFromGoogle->name,
               'email' => $userFromGoogle->email,
               //'avatar' => $providerUser->picture, // in case you have an avatar and want to use google's
           ]);
       }
       /**
        * Save new access token for existing user
        */
       else {
           $user->google_access_token_json = json_encode($accessToken);
           $user->save();
       }

       /**
        * Log in and return token
        * HTTP 201
        */
       $token = $user->createToken("Google")->accessToken;
       return response()->json($token, 201);
   }
   public function manage_business(Request $request)
   {

       $google=my_social_profiles(auth()->user()->id)['Google'];
       $client=$this->getClient();
       $client->setAccessToken($google->access_token);
       $httpClient=$client->authorize();


       $mybusinessService = new \Google_Service_MyBusinessAccountManagement($client);
       $accounts = $mybusinessService->accounts;
       $accountsList = $accounts->listAccounts();
     $acount=$accountsList->getAccounts()[0];

       $url = "https://mybusinessbusinessinformation.googleapis.com/v1/accounts";
       $response = $this->curl( $url );
       $accounts = $response['accounts'];
       dd($accounts);

       $url = "https://mybusinessbusinessinformation.googleapis.com/v1/$acount->name/locations?readMask=title,name";
       $response = $this->curl( $url );
       $locations = $response['locations'];
       dd($locations);
       $res=$httpClient->get('https://mybusinessbusinessinformation.googleapis.com/v1/'.$acount->name.'/locations?readMask=title,name');
       dd($res->getBody());
//       $mybusinessService = new \Google_Service_MyBusinessAccountManagement($client);
//       $accounts = $mybusinessService->accounts;
//       $accountsList = $accounts->listAccounts()->getAccounts();
//
//       $list_accounts_response = $accountsList[0]->accounts_locations->listAccountsLocations("accounts/114893266195214446586", $optParams);
//       dd($list_accounts_response);
   }
    public function curl( $url ) {
        $google=my_social_profiles(auth()->user()->id)['Google'];
        dd($google->access_token);

        $curler = curl_init();
        curl_setopt( $curler, CURLOPT_URL, $url );
        curl_setopt( $curler, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Authorization: Bearer ' .$google->access_token ) );
        curl_setopt( $curler, CURLOPT_RETURNTRANSFER, 1 );
        $curl_response = curl_exec( $curler );
        curl_close( $curler );
        return json_decode( $curl_response, true );
    }
}
//asdasd
