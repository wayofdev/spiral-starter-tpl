<?php

declare(strict_types=1);

namespace Domain\Auth;

use Domain\Auth\Contracts\AccessToken;

final readonly class Token implements AccessToken
{
    private function __construct(
        private string $issuer,
        private string $subject,
        private array $audience,
        private int $issuedAt,
        private int $expiration,
        private string $authorizedParty,
        private string $scope
    ) {
    }

    public static function fromArray(array $attributes): self
    {
        return new self(
            issuer: $attributes['iss'],
            subject: $attributes['sub'],
            audience: $attributes['aud'],
            issuedAt: $attributes['iat'],
            expiration: $attributes['exp'],
            authorizedParty: $attributes['azp'],
            scope: $attributes['scope']
        );
    }

    public function id(): string
    {
        return $this->subject;
    }

    public function authorizedParty(): string
    {
        return $this->authorizedParty;
    }

    public function realm(): string
    {
        return $this->issuer;
    }

    public function footprint(): TokenFootprint
    {
        return TokenFootprint::fromToken($this);
    }

    public function toArray(): array
    {
        return [
            'iss' => $this->issuer,
            'sub' => $this->subject,
            'aud' => $this->audience,
            'iat' => $this->issuedAt,
            'exp' => $this->expiration,
            'azp' => $this->authorizedParty,
            'scope' => $this->scope,
        ];
    }
}
