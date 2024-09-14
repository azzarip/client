<?php

return [
    'cookie-consent' => true,

    'call' => [
        'username' => env('APP_NAME'),
        'password' => env('AZZARI_CALL_PASSWORD'),
        'url' => rtrim(env('AZZARI_CALL_URL'), '/'),
    ],

    'response' => [
        'username' => 'pizzaazzari',
        'password' => env('AZZARI_RESPONSE_PASSWORD'),
    ],
];
