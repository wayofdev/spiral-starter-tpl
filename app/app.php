<?php

declare(strict_types=1);

use App\Application\Exception\Handler;
use App\Application\Kernel;

mb_internal_encoding('UTF-8');
error_reporting((E_ALL | E_STRICT) ^ E_DEPRECATED);
ini_set('display_errors', 'stderr');

require __DIR__ . '/functions.php';
require __DIR__ . '/vendor/autoload.php';

$app = Kernel::create(
    directories: [
        'root' => __DIR__,
        'app' => __DIR__ . '/src',
        'config' => __DIR__ . '/config',
        'public' => __DIR__ . '/public',
        'runtime' => __DIR__ . '/runtime',
        'views' => __DIR__ . '/views',
    ],
    exceptionHandler: Handler::class,
)->run();

if ($app === null) {
    exit(255);
}

$code = (int) $app->serve();

exit($code);
