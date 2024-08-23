<?php

declare(strict_types=1);

namespace Domain\Project\Contracts;

use Domain\Project\ProjectId;

interface ProjectIdGenerator
{
    public function nextId(): ProjectId;
}
