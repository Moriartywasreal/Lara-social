<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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
		'facebook' => [
				'client_id' => '1447989375251954',
				'client_secret' => 'f42edba255c5e9b10b9c785d807c9f11',
				'redirect' => 'http://localhost:8000/auth/facebook/callback',
		],
		'google' => [
				'client_id' => '995737820439-6jqun647kvi0qc2092v37gu5b9uavoh8.apps.googleusercontent.com',
				'client_secret' => 'regpuXX_gEA3hqpdSt4-URxt',
				'redirect' => 'http://localhost:8000/auth/google/callback',
		],
		'instagram' => [
				'client_id' => '6f3ff21adef847d29a8484a724d19420',
				'client_secret' => '11ef77443922458a87b875eeede429bd',
				'redirect' => 'http://localhost:8000/auth/instagram/callback',
		],
		'twitter' => [
				'client_id' => 'PMk8jocmW4mXKHWcJyZOGz20B',
				'client_secret' => 'hquUUgIjRvPUcJwNCjnpz8J6YwjZUXKB8sNP86FdLuVFQPatPk',
				'redirect' => 'http://localhost:8000/auth/twitter/callback',
		],
];
