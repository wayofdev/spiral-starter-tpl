<?php

declare(strict_types=1);

use Spiral\Core\Container\Autowire;
use Spiral\Session\Handler\FileHandler;

/**
 * Session configuration.
 *
 * @see https://spiral.dev/docs/basics-session
 */
return [
    'lifetime' => (int) env('SESSION_LIFETIME', 86400),
    'cookie' => env('SESSION_COOKIE', 'sid'),
    'secure' => true,
    'sameSite' => null,
    'handler' => new Autowire(
        FileHandler::class,
        [
            'directory' => directory('runtime') . 'Session',
            'lifetime' => (int) env('SESSION_LIFETIME', 86400),
        ]
    ),
];
