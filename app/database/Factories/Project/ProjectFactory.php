<?php

declare(strict_types=1);

namespace Database\Factories\Project;

use Domain\Auth\Signature;
use Domain\Project\Project;
use Spiral\DatabaseSeeder\Factory\AbstractFactory;

final class ProjectFactory extends AbstractFactory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'signature' => Signature::random(),
        ];
    }

    public function makeEntity(array $definition): Project
    {
        return new Project(
            id: $definition['id'],
            name: $definition['name'],
            description: $definition['description'],
            signature: $definition['signature'],
        );
    }

    public function entity(): string
    {
        return Project::class;
    }
}
