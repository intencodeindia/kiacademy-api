<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => \App\Filters\Cors::class,
        'auth'          => \App\Filters\AuthFilters::class,
    ];

    public array $globals = [
        'before' => [
            'cors' => ['except' => ['api/*']],
        ],
        'after' => [
            'toolbar',
        ],
    ];

    public array $methods = [];

    public array $filters = [
         'auth' => [
            'before' => [
                'api/*', // Apply the auth filter to all routes starting with 'api/'
            ],
        ],
        'cors' => [
            'before' => [
                'api/*',
            ],
        ],
    ];
}

