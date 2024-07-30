<?php

declare(strict_types=1);

use Temporal\Worker\WorkerFactoryInterface;
use Temporal\Worker\WorkerOptions;

return [
    'address' => env('TEMPORAL_ADDRESS', 'temporal:7233'),
    'defaultWorker' => WorkerFactoryInterface::DEFAULT_TASK_QUEUE,
    'workers' => [
        'workerName' => WorkerOptions::new()
    ],
];
