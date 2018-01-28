<?php

return [
    # Define your application mode here
    'mode' => 'sandbox',

    # Account credentials from developer portal
    'account' => [
        'client_id' => env('PAYPAL_CLIENT_ID', 'AUb-F56Ke2_0zJmpQe6AfxDYBmpMg_lfR0U4R0KmTIp4HkfevklPBH6Cn1nmytaDZuLMy6o1HVgoAg_T'),
        'client_secret' => env('PAYPAL_CLIENT_SECRET', 'EI_M5ZNHWesU8e25sHDfQ_6ncbh_wKqIVO6SOo7w4qjaNjyki9FOahcToOVhUAn7bIv3otZ8aJB6QOmT'),
    ],

    # Connection Information
    'http' => [
        'connection_time_out' => 30,
        'retry' => 1,
    ],

    # Logging Information
    'log' => [
        'log_enabled' => true,

        # When using a relative path, the log file is created
        # relative to the .php file that is the entry point
        # for this request. You can also provide an absolute
        # path here
        'file_name' => '../PayPal.log',

        # Logging level can be one of FINE, INFO, WARN or ERROR
        # Logging is most verbose in the 'FINE' level and
        # decreases as you proceed towards ERROR
        'log_level' => 'FINE',
    ],
];
