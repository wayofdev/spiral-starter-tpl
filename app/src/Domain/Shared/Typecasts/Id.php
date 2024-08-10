<?php

declare(strict_types=1);

namespace Domain\Shared\Typecasts;

use Assert\AssertionFailedException;
use Cycle\Database\DatabaseInterface;
use EventSauce\EventSourcing\AggregateRootId;
use Ramsey\Uuid\Uuid;
use Domain\Shared\Events\Concerns\AggregatableRootId;

/**
 * @phpstan-consistent-constructor
 */
abstract class Id implements AggregateRootId
{
    use AggregatableRootId;

    /**
     * @throws AssertionFailedException
     */
    public static function create(): static
    {
        return new static(Uuid::uuid7()->toString());
    }

    /**
     * @throws AssertionFailedException
     */
    public static function fromString(string $aggregateRootId): static
    {
        return new static($aggregateRootId);
    }

    /**
     * @throws AssertionFailedException
     */
    public static function castValue(string $value, DatabaseInterface $db): self
    {
        return static::fromString($value);
    }
}
