<?php

declare(strict_types=1);

namespace Bridge\Spiral\Bootloaders;

use Domain\User\Repository\UserRepositoryInterface;
use Infrastructure\Persistence\CycleORMUserRepository;
use Spiral\Boot\Bootloader\Bootloader;

/**
 * Simple bootloaders that registers Domain repositories.
 */
final class PersistenceBootloader extends Bootloader
{
    public function defineSingletons(): array
    {
        return [
            UserRepositoryInterface::class => CycleORMUserRepository::class,
        ];
    }
}
