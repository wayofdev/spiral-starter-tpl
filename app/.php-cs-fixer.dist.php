<?php

declare(strict_types=1);

use WayOfDev\PhpCsFixer\Config\ConfigBuilder;
use WayOfDev\PhpCsFixer\Config\RuleSets\DefaultSet;

require_once 'vendor/autoload.php';

$config = ConfigBuilder::createFromRuleSet(new DefaultSet(['static_lambda' => false]))
    ->inDir(__DIR__ . '/config')
    ->inDir(__DIR__ . '/database')
    ->inDir(__DIR__ . '/src')
    ->inDir(__DIR__ . '/tests')
    ->addFiles([
        __FILE__,
        __DIR__ . '/functions.php',
        __DIR__ . '/app.php',
        __DIR__ . '/rector.php',
    ])
    ->useParallelConfig()
    ->getConfig()
;

$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/php-cs-fixer.cache');

return $config;
