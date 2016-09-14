<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'api' => [
        'url' => 'http://127.0.0.1:9000/v1/',
        'port' => 9000
    ],

    'twitter' => [
        'client_id' => 'qXIZxC9eBf2Nc4g2Ng9eV4X3c',
        'client_secret' => 'r3rkw380xgi7DKGrmVW0XPTZk0DxvnIcGUCvUysGpWt0OsdF56',
        'access_token' => '371078881-WDYOaGrwHv0V8rXWsp3MXzInRrpi6AsAzqcStgOP',
        'access_token_key' => 'oYO0OCLWI703B52erHY72AdFdUnvm8jtbhNdSbQOp9Gnm',
        'redirect' => 'http://lorelixir.com/twitter-callback',
    ],


];
