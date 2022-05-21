<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\state;
use Illuminate\Support\Facades\Config;


class Env extends Controller
{
    public static function isTestMode()
    {
     return true;
    }
     public static function  GoogleMap_Key()
{
  return Config::get('myconfig.GoogleMap.key');
}
    public static function Ligiscan_Key()
    {
        return Config::get('myconfig.Ligiscan.key');
    }
    public static function Official_Key()
    {
        return Config::get('myconfig.Official.key');
    }
    public static function Regulatinsgov_Key()
    {
        return Config::get('myconfig.Regulatinsgov.key');
    }


}
