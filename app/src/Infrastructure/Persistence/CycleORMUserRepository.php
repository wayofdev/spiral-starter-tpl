<?php

declare(strict_types=1);

namespace Infrastructure\Persistence;

use Cycle\ORM\Select\Repository;
use Domain\User\Entity\User;
use Domain\User\Exception\UserNotFoundException;
use Domain\User\Repository\UserRepositoryInterface;

/**
 * @template TUser of User
 *
 * @extends Repository<TUser>
 */
final class CycleORMUserRepository extends Repository implements UserRepositoryInterface
{
    public function getById(int $id): User
    {
        $user = $this->findByPK($id);

        if ($user === null) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
