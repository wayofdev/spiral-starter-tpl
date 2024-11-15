<?php

declare(strict_types=1);

namespace Domain\Auth;

use function get_object_vars;

final readonly class TokenFootprint
{
    public function __construct(
        private string $id,
        private string $party,
        private string $realm,
    ) {
    }

    public static function fromToken(Token $token): self
    {
        return new self(
            $token->id(),
            $token->authorizedParty(),
            $token->realm()
        );
    }

    public function getIdentity(): string
    {
        return $this->id;
    }

    public function getParty(): string
    {
        return $this->party;
    }

    public function getRealm(): string
    {
        return $this->realm;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
