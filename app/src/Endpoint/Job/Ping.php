<?php

declare(strict_types=1);

namespace App\Endpoint\Job;

use App\Endpoint\Console\PingCommand;
use Spiral\Logger\LogsInterface;
use Spiral\Queue\JobHandler;

/**
 * Simple job handler that will be invoked by a queue consumer.
 * To push a job to a queue use {@see PingCommand} console command.
 *
 * Or use {@see \Spiral\Queue\QueueInterface} directly.
 * (Spiral\Queue\QueueInterface)->push(PingJob::class, ["site"=>"http://site.com"]);
 */
final class Ping extends JobHandler
{
    public function invoke(LogsInterface $logger, string $site): void
    {
        $logger->getLogger()->info('Ping job invoked', ['site' => $site]);
    }
}
