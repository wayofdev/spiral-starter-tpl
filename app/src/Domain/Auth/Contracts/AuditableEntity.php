<?php

declare(strict_types=1);

namespace Domain\Auth\Contracts;

use Domain\Auth\Signature;

interface AuditableEntity
{
    public function created(): Signature;

    public function updated(): Signature;

    public function deleted(): ?Signature;
}
