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
        'client_id' => 'Vvh1ZLcMyJEZgYiCA9ggBr2AU',
        'client_secret' => 'pROMWkTT7omdJPyLgy7ML05jcyuStjSNKANY7S8IO5afnDj6dm',
        'access_token' => '371078881-qKXe2b64Mh8NiCSA6fAeLdJO6MTePzbU2S3GYcNH',
        'access_token_key' => 'smyMEPz7tykI8D3wIi12GaURqYvAdDhQ4HJpiAaGYLOIk',
        'redirect' => 'http://lorelixir.com/twitter-callback',
    ],


];
