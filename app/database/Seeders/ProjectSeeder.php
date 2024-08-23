<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\Project\ProjectFactory;
use Generator;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
final class ProjectSeeder extends AbstractSeeder
{
    public function run(): Generator
    {
        foreach (ProjectFactory::new()->times(20)->make() as $project) {
            yield $project;
        }
    }
}
