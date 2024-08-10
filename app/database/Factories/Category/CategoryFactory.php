<?php

declare(strict_types=1);

namespace Database\Factories\Category;

use Domain\Category\Category;
use Spiral\DatabaseSeeder\Factory\AbstractFactory;

final class CategoryFactory extends AbstractFactory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
        ];
    }

    public function makeEntity(array $definition): Category
    {
        return new Category(
        );
    }

    public function entity(): string
    {
        return Category::class;
    }
}
