<?php

declare(strict_types=1);

namespace Domain\User\Repository;

use Domain\User\Entity\User;
use Domain\User\Exception\UserNotFoundException;

interface UserRepositoryInterface
{
    /**
     * @throws UserNotFoundException
     */
    public function getById(int $id): User;
}
