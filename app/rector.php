<?php

declare(strict_types=1);

use Rector\Config;
use Rector\Php81;
use Rector\PHPUnit;
use Rector\ValueObject;

return Config\RectorConfig::configure()
    ->withCache(__DIR__ . '/.build/rector/')
    ->withPaths([
        __DIR__ . '/config/',
        __DIR__ . '/database/',
        __DIR__ . '/src/',
        __DIR__ . '/tests/',
        __DIR__ . '/.php-cs-fixer.dist.php',
        __DIR__ . '/rector.php',
        __DIR__ . '/functions.php',
        __DIR__ . '/app.php',
    ])
    ->withPhpVersion(ValueObject\PhpVersion::PHP_83)
    ->withRules([
        Php81\Rector\Property\ReadOnlyPropertyRector::class,
    ])
    ->withSets([
        PHPUnit\Set\PHPUnitSetList::PHPUNIT_100,
    ])
;
