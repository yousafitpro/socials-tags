<?php
return [
    'mail' =>[
        'from'=>env('MAIL_USERNAME', 'none'),
        'company_name'=>"Techvoters News",
        'admin_email'=>env('MAIL_USERNAME', 'none'),
        'redirectOnSuccess'=>"https://www.google.com/",
    ],
    'Ligiscan' =>[
       'key'=>env('Ligiscan_key', 'none')
],
    'Official' =>[
        'key'=>env('Official_key', 'none')
    ],
    'Regulatinsgov' =>[
        'key'=>env('Regulatinsgov_key', 'none')
    ],
    'GoogleMap' =>[
        'key'=>env('Googlemap_key', 'none')
    ],
    'Walls' =>[
        'key'=>env('Walls_key', 'none')
    ],
    'daily' =>[
        'url'=>env('dailUrl', 'none'),
        'key'=>env('dailKey', 'none')
    ],
    'TW' =>[
        'client_id'=>env('TW_client_id', 'none'),
        'brear_token'=>env('TW_brear_token', 'none')
    ],
    'Paypal' =>[
        'client_id'=>env('Paypal_client_id', 'none'),
        'secret'=>env('Paypal_secret', 'none')
    ],
    'FB' =>[
    'app_id'=>env('FB_app_id', 'none'),
    'api_version'=>env('FB_api_version', 'none')
],
    'TripeAdvisor' =>[
        'key'=>env('TripeAdvisor_Key', 'none'),
        'url'=>env('TripeAdvisor_URL', 'none')
    ]
];
