<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence;

use App\Domain\User\Entity\User;
use App\Domain\User\Exception\UserNotFoundException;
use App\Domain\User\Repository\UserRepositoryInterface;
use Cycle\ORM\Select\Repository;

/**
 * @template TUser of User
 *
 * @extends Repository<TUser>
 */
final class CycleORMUserRepository extends Repository implements UserRepositoryInterface
{
    public function findById(int $id): User
    {
        $user = $this->findByPK($id);

        if (null === $user) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
