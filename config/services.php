<?php
//  $base_url = url('/');

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '724548363685-kfuh2b6ng6fureq0a2jcsaoeepbv70cf.apps.googleusercontent.com',//USE FROM GOOGLE DEVELOPER ACCOUNT
        'client_secret' => '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',//USE FROM GOOGLE DEVELOPER ACCOUNT
        'redirect' => '/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '1002067133727044', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => 'e15735f9e1a9c758a6129225d6ff71ac', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => '/facebook/callback'
    ],
   

];
