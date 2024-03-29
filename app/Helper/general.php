<?php


use App\Models\User;


use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
function saveImage($img, $path, $name = null)
{
    $name = $name ?: rand(1000, 9999) . time() . '.' . $img->getClientOriginalExtension();
    $img->move(public_path($path), $name);

    return $name;
}
if ( ! function_exists('countries_list')) {
    function countries_list()
    {
        $countries_list = array(
            "AF" => "Afghanistan",
            "AX" => "Aland Islands",
            "AL" => "Albania",
            "DZ" => "Algeria",
            "AS" => "American Samoa",
            "AD" => "Andorra",
            "AO" => "Angola",
            "AI" => "Anguilla",
            "AQ" => "Antarctica",
            "AG" => "Antigua and Barbuda",
            "AR" => "Argentina",
            "AM" => "Armenia",
            "AW" => "Aruba",
            "AU" => "Australia",
            "AT" => "Austria",
            "AZ" => "Azerbaijan",
            "BS" => "Bahamas",
            "BH" => "Bahrain",
            "BD" => "Bangladesh",
            "BB" => "Barbados",
            "BY" => "Belarus",
            "BE" => "Belgium",
            "BZ" => "Belize",
            "BJ" => "Benin",
            "BM" => "Bermuda",
            "BT" => "Bhutan",
            "BO" => "Bolivia",
            "BQ" => "Bonaire, Sint Eustatius and Saba",
            "BA" => "Bosnia and Herzegovina",
            "BW" => "Botswana",
            "BV" => "Bouvet Island",
            "BR" => "Brazil",
            "IO" => "British Indian Ocean Territory",
            "BN" => "Brunei Darussalam",
            "BG" => "Bulgaria",
            "BF" => "Burkina Faso",
            "BI" => "Burundi",
            "KH" => "Cambodia",
            "CM" => "Cameroon",
            "CA" => "Canada",
            "CV" => "Cape Verde",
            "KY" => "Cayman Islands",
            "CF" => "Central African Republic",
            "TD" => "Chad",
            "CL" => "Chile",
            "CN" => "China",
            "CX" => "Christmas Island",
            "CC" => "Cocos (Keeling) Islands",
            "CO" => "Colombia",
            "KM" => "Comoros",
            "CG" => "Congo",
            "CD" => "Congo, the Democratic Republic of the",
            "CK" => "Cook Islands",
            "CR" => "Costa Rica",
            "CI" => "Cote D'Ivoire",
            "HR" => "Croatia",
            "CU" => "Cuba",
            "CW" => "Curacao",
            "CY" => "Cyprus",
            "CZ" => "Czech Republic",
            "DK" => "Denmark",
            "DJ" => "Djibouti",
            "DM" => "Dominica",
            "DO" => "Dominican Republic",
            "EC" => "Ecuador",
            "EG" => "Egypt",
            "SV" => "El Salvador",
            "GQ" => "Equatorial Guinea",
            "ER" => "Eritrea",
            "EE" => "Estonia",
            "ET" => "Ethiopia",
            "FK" => "Falkland Islands (Malvinas)",
            "FO" => "Faroe Islands",
            "FJ" => "Fiji",
            "FI" => "Finland",
            "FR" => "France",
            "GF" => "French Guiana",
            "PF" => "French Polynesia",
            "TF" => "French Southern Territories",
            "GA" => "Gabon",
            "GM" => "Gambia",
            "GE" => "Georgia",
            "DE" => "Germany",
            "GH" => "Ghana",
            "GI" => "Gibraltar",
            "GR" => "Greece",
            "GL" => "Greenland",
            "GD" => "Grenada",
            "GP" => "Guadeloupe",
            "GU" => "Guam",
            "GT" => "Guatemala",
            "GG" => "Guernsey",
            "GN" => "Guinea",
            "GW" => "Guinea-Bissau",
            "GY" => "Guyana",
            "HT" => "Haiti",
            "HM" => "Heard Island and Mcdonald Islands",
            "VA" => "Holy See (Vatican City State)",
            "HN" => "Honduras",
            "HK" => "Hong Kong",
            "HU" => "Hungary",
            "IS" => "Iceland",
            "IN" => "India",
            "ID" => "Indonesia",
            "IR" => "Iran, Islamic Republic of",
            "IQ" => "Iraq",
            "IE" => "Ireland",
            "IM" => "Isle of Man",
            "IL" => "Israel",
            "IT" => "Italy",
            "JM" => "Jamaica",
            "JP" => "Japan",
            "JE" => "Jersey",
            "JO" => "Jordan",
            "KZ" => "Kazakhstan",
            "KE" => "Kenya",
            "KI" => "Kiribati",
            "KP" => "Korea, Democratic People's Republic of",
            "KR" => "Korea, Republic of",
            "XK" => "Kosovo",
            "KW" => "Kuwait",
            "KG" => "Kyrgyzstan",
            "LA" => "Lao People's Democratic Republic",
            "LV" => "Latvia",
            "LB" => "Lebanon",
            "LS" => "Lesotho",
            "LR" => "Liberia",
            "LY" => "Libyan Arab Jamahiriya",
            "LI" => "Liechtenstein",
            "LT" => "Lithuania",
            "LU" => "Luxembourg",
            "MO" => "Macao",
            "MK" => "Macedonia, the Former Yugoslav Republic of",
            "MG" => "Madagascar",
            "MW" => "Malawi",
            "MY" => "Malaysia",
            "MV" => "Maldives",
            "ML" => "Mali",
            "MT" => "Malta",
            "MH" => "Marshall Islands",
            "MQ" => "Martinique",
            "MR" => "Mauritania",
            "MU" => "Mauritius",
            "YT" => "Mayotte",
            "MX" => "Mexico",
            "FM" => "Micronesia, Federated States of",
            "MD" => "Moldova, Republic of",
            "MC" => "Monaco",
            "MN" => "Mongolia",
            "ME" => "Montenegro",
            "MS" => "Montserrat",
            "MA" => "Morocco",
            "MZ" => "Mozambique",
            "MM" => "Myanmar",
            "NA" => "Namibia",
            "NR" => "Nauru",
            "NP" => "Nepal",
            "NL" => "Netherlands",
            "AN" => "Netherlands Antilles",
            "NC" => "New Caledonia",
            "NZ" => "New Zealand",
            "NI" => "Nicaragua",
            "NE" => "Niger",
            "NG" => "Nigeria",
            "NU" => "Niue",
            "NF" => "Norfolk Island",
            "MP" => "Northern Mariana Islands",
            "NO" => "Norway",
            "OM" => "Oman",
            "PK" => "Pakistan",
            "PW" => "Palau",
            "PS" => "Palestinian Territory, Occupied",
            "PA" => "Panama",
            "PG" => "Papua New Guinea",
            "PY" => "Paraguay",
            "PE" => "Peru",
            "PH" => "Philippines",
            "PN" => "Pitcairn",
            "PL" => "Poland",
            "PT" => "Portugal",
            "PR" => "Puerto Rico",
            "QA" => "Qatar",
            "RE" => "Reunion",
            "RO" => "Romania",
            "RU" => "Russian Federation",
            "RW" => "Rwanda",
            "BL" => "Saint Barthelemy",
            "SH" => "Saint Helena",
            "KN" => "Saint Kitts and Nevis",
            "LC" => "Saint Lucia",
            "MF" => "Saint Martin",
            "PM" => "Saint Pierre and Miquelon",
            "VC" => "Saint Vincent and the Grenadines",
            "WS" => "Samoa",
            "SM" => "San Marino",
            "ST" => "Sao Tome and Principe",
            "SA" => "Saudi Arabia",
            "SN" => "Senegal",
            "RS" => "Serbia",
            "CS" => "Serbia and Montenegro",
            "SC" => "Seychelles",
            "SL" => "Sierra Leone",
            "SG" => "Singapore",
            "SX" => "Sint Maarten",
            "SK" => "Slovakia",
            "SI" => "Slovenia",
            "SB" => "Solomon Islands",
            "SO" => "Somalia",
            "ZA" => "South Africa",
            "GS" => "South Georgia and the South Sandwich Islands",
            "SS" => "South Sudan",
            "ES" => "Spain",
            "LK" => "Sri Lanka",
            "SD" => "Sudan",
            "SR" => "Suriname",
            "SJ" => "Svalbard and Jan Mayen",
            "SZ" => "Swaziland",
            "SE" => "Sweden",
            "CH" => "Switzerland",
            "SY" => "Syrian Arab Republic",
            "TW" => "Taiwan, Province of China",
            "TJ" => "Tajikistan",
            "TZ" => "Tanzania, United Republic of",
            "TH" => "Thailand",
            "TL" => "Timor-Leste",
            "TG" => "Togo",
            "TK" => "Tokelau",
            "TO" => "Tonga",
            "TT" => "Trinidad and Tobago",
            "TN" => "Tunisia",
            "TR" => "Turkey",
            "TM" => "Turkmenistan",
            "TC" => "Turks and Caicos Islands",
            "TV" => "Tuvalu",
            "UG" => "Uganda",
            "UA" => "Ukraine",
            "AE" => "United Arab Emirates",
            "GB" => "United Kingdom",
            "US" => "United States",
            "UM" => "United States Minor Outlying Islands",
            "UY" => "Uruguay",
            "UZ" => "Uzbekistan",
            "VU" => "Vanuatu",
            "VE" => "Venezuela",
            "VN" => "Viet Nam",
            "VG" => "Virgin Islands, British",
            "VI" => "Virgin Islands, U.s.",
            "WF" => "Wallis and Futuna",
            "EH" => "Western Sahara",
            "YE" => "Yemen",
            "ZM" => "Zambia",
            "ZW" => "Zimbabwe"
        );
        return $countries_list;

    }
}
if ( ! function_exists('my_social_profiles')) {
    function my_social_profiles($user_id)
    {
        $data['temp']=null;
        if(!\App\Models\socialConnect::where(['name'=>'Facebook','user_id'=>$user_id])->exists())
        {
            $data['Facebook']=\App\Models\socialConnect::create([
               'name'=>'Facebook',
               'platform'=>'Facebook',
               'user_id'=>auth()->user()->id
           ]);
        }else{
            $data['Facebook']=\App\Models\socialConnect::where(['name'=>'Facebook','user_id'=>$user_id])->first();
        }
        if(!\App\Models\socialConnect::where(['name'=>'Google','user_id'=>$user_id])->exists())
        {
            $data['Google']=\App\Models\socialConnect::create([
                'name'=>'Google',
                'platform'=>'Google',
                'user_id'=>auth()->user()->id
            ]);
        }else{
            $data['Google']=\App\Models\socialConnect::where(['name'=>'Google','user_id'=>$user_id])->first();
        }
        return $data;

    }
}

if ( ! function_exists('dollar_to_cents')){
    function dollar_to_cents($dollars)
    {
        $dollars=round($dollars,2);
        $dollars=$dollars * 100;
        $cents=intval($dollars);
        return $cents;
    }
}
if ( ! function_exists('get_month_name')){
    function get_month_name($date)
    {
        $name=Carbon::parse($date)->monthName;

        return $name;

    }
}
if ( ! function_exists('app_controllers')){
    function app_controllers()
    {
        return ['7','110'];
    }
}
if ( ! function_exists('date_human_readable')){
    function date_human_readable($date)
    {
        Carbon::getHumanDiffOptions($date);
    }
}
if ( ! function_exists('today_date')){
    function today_date()
    {
        return Carbon::now()->timezone(Config::get('app.timezone'))->format('Y-m-d');
    }
}
if ( ! function_exists('post_comments')){
    function post_comments($post_id)
    {
        return \App\Models\postComment::where('post_id',$post_id)->latest()->get();
    }
}
if ( ! function_exists('related_posts')){
    function related_posts($post_id)
    {
        return \App\Models\post::query()->where('id','!=',$post_id)->get()->take(10);
    }
}
//asdasd
if ( ! function_exists('is_membershipExpired')){
    function is_membershipExpired()
    {
        if((auth()->check() && (auth()->user()->valid_till<today_date() || auth()->user()->valid_till=='renew' || auth()->user()->valid_till==null)) || !auth()->check())
        {
           return true;
        }
        return  false;
    }
}
if ( ! function_exists('human_readable_time')){
    function human_readable_time($time)
    {
        return Carbon::parse($time)->diffForHumans();
    }
}
if ( ! function_exists('app_encrypt')){
    function app_encrypt($number)
    {
        return 1234567*$number;
    }
}
if ( ! function_exists('app_decrypt')){
    function app_decrypt($number)
    {
        return $number/1234567;
    }
}
if ( ! function_exists('time_now')){
    function time_now()
    {
        return Carbon::now()->timezone(Config::get('app.timezone'))->format('Y-m-d H:i:s');
    }
}
if ( ! function_exists('who_is_admin')){
    function who_is_admin()
    {
        return 9;
    }

}
if ( ! function_exists('cutNum')) {
    function cutNum($num, $precision = 2)
    {
        return floor($num) . substr(str_replace(floor($num), '', $num), 0, $precision + 1);
    }
}
if ( ! function_exists('app_encrypt')) {
    function app_encrypt($number)
    {
        return $number*123456;
    }
}
if ( ! function_exists('app_decrypt')) {
    function app_decrypt($number)
    {
        return $number/123456;
    }
}



