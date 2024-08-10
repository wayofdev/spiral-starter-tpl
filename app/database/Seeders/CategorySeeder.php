<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\Category\CategoryFactory;
use Generator;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
final class CategorySeeder extends AbstractSeeder
{
    public function run(): Generator
    {
        foreach (CategoryFactory::new()->times(20)->make() as $category) {
            yield $category;
        }
    }
}
