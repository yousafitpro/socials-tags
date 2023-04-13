<?php

namespace App\Http\Controllers;
//require_once 'vendor/autoload.php';

use Illuminate\Http\Request;

class googleController extends Controller
{
   public function index(Request $request)
   {
      $client = new \Google_Client();
      $client->setAuthConfig('../Google/client_secret.json');
      $client->setAccessType('offline');
       $client->setScopes(
           [
               \Google\Service\Drive::DRIVE_METADATA_READONLY
           ]
       );
       $client->setIncludeGrantedScopes(true);
        return redirect($client->createAuthUrl());
   }
}
//asdasd
