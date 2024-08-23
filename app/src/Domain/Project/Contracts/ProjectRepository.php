<?php

declare(strict_types=1);

namespace Domain\Project\Contracts;

use Cycle\ORM\RepositoryInterface;

interface ProjectRepository extends RepositoryInterface
{
    public function findById(string $id): ?object;
}
