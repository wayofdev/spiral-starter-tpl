<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

use App\Infrastructure\Persistence\CycleORMUserRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity(
    repository: CycleORMUserRepository::class,
)]
class User
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     */
    #[Column(type: 'primary')]
    private readonly int $id;

    public function __construct(
        #[Column(type: 'string')] private readonly string $username,
        #[Column(type: 'string')] private readonly string $email,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
