<?php

declare(strict_types=1);

namespace Domain\Shared\Events\Concerns;

use BadMethodCallException;
use EventSauce\EventSourcing\AggregateRootId;
use Generator;

use function sprintf;

trait AggregatableRoot
{
    /**
     * @var object[]
     */
    private array $recordedEvents = [];

    /**
     * @throws BadMethodCallException
     */
    public static function reconstituteFromEvents(AggregateRootId $aggregateRootId, Generator $events): static
    {
        throw new BadMethodCallException(sprintf('Method "%s" not implemented.', __METHOD__));
    }

    /**
     * Aggregate root version is not supported.
     */
    public function aggregateRootVersion(): int
    {
        return 0;
    }

    /**
     * @return object[]
     */
    public function releaseEvents(): array
    {
        $releasedEvents = $this->recordedEvents;
        $this->recordedEvents = [];

        return $releasedEvents;
    }

    protected function recordThat(object $event): void
    {
        $this->recordedEvents[] = $event;
    }
}
