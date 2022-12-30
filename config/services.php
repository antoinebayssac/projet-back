<?php

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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'tmdb' => [
        'endpoint' => env(' https://api.themoviedb.org/3/'),
        'api' => env('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxOWUzYmQ1ZDI2ZjQyM2RkOTY5OWE3NTdmN2ViYWYyNCIsInN1YiI6IjYzYWVhN2NiN2VmMzgxMWY2YzE1Y2MwMSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.A4IKa3hJ6xz8D2Uoa2FR1eLzhPhcQ0B966X-1NQg9f0'),
    ],
];
