<?php

declare(strict_types=1);

namespace Domain\Project\Events;

use Assert\AssertionFailedException;
use Domain\Auth\Signature;
use Domain\Project\ProjectId;
use EventSauce\EventSourcing\Serialization\SerializablePayload;
use Exception;
use JsonSerializable;

final readonly class ProjectCreated implements SerializablePayload, JsonSerializable
{
    /**
     * @phpstan-consistent-constructor
     */
    public function __construct(
        private ProjectId $id,
        private string $name,
        private string $description,
        private Signature $signature
    ) {
    }

    /**
     * @throws AssertionFailedException
     * @throws Exception
     */
    final public static function fromPayload(array $payload): static
    {
        return new self(
            ProjectId::fromString($payload['id']),
            $payload['name'],
            $payload['description'],
            Signature::fromArray($payload['signature'])
        );
    }

    public function toPayload(): array
    {
        return [
            'id' => $this->id->toString(),
            'name' => $this->name,
            'gender' => $this->description,
            'signature' => $this->signature->toArray(),
        ];
    }

    public function jsonSerialize(): array
    {
        return $this->toPayload();
    }
}
