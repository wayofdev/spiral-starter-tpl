<?php

declare(strict_types=1);

namespace Domain\Auth\Contracts;

use Domain\Auth\TokenFootprint;

interface AccessToken
{
    public function id(): string;

    public function authorizedParty(): string;

    public function realm(): string;

    public function footprint(): TokenFootprint;

    public function toArray(): array;
}
