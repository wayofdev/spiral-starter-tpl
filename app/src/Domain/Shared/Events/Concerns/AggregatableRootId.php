<?php

declare(strict_types=1);

namespace Domain\Shared\Events\Concerns;

use Assert\Assertion;
use Assert\AssertionFailedException;

trait AggregatableRootId
{
    protected string $id;

    /**
     * @throws AssertionFailedException
     */
    private function __construct(string $id)
    {
        $this->assertValidId($id);

        $this->id = $id;
    }

    public function equals(self $entityId): bool
    {
        return $this->id === $entityId->id;
    }

    public function toString(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @throws AssertionFailedException
     */
    protected function assertValidId(string $id): void
    {
        Assertion::uuid($id);
    }
}
