<?php

declare(strict_types=1);

namespace Bridge\Spiral\Public\Ping\Jobs;

use Bridge\Spiral\Console\PingCommand;
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
