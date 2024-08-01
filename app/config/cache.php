<?php

declare(strict_types=1);

use Spiral\Cache\Storage\FileStorage;

/**
 * Configuration for cache component.
 *
 * @see https://spiral.dev/docs/basics-cache
 */
return [
    /*
     * The default cache connection that gets used while using this caching library.
     */
    'default' => env('CACHE_STORAGE', 'roadrunner'),

    /*
     * Aliases, if you want to use domain specific storages.
     */
    'aliases' => [
        // 'user-data' => [
        //     'storage' => 'roadrunner',
        //     'prefix' => 'user_'
        // ],
        // 'blog-data' => 'roadrunner',
    ],

    /*
     * Here you may define all the cache "storages" for your application as well as their types.
     */
    'storages' => [
        'roadrunner' => [
            'type' => 'roadrunner',
            'driver' => 'local',
        ],
        'array' => [
            'type' => 'array',
        ],
        'file' => [
            'type' => 'file',
            'path' => directory('runtime') . 'Cache',
        ],
    ],

    /*
     * Aliases for storage types
     */
    'typeAliases' => [
        'file' => FileStorage::class,
    ],
];
