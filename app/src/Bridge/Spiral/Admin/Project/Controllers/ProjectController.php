<?php

declare(strict_types=1);

namespace Bridge\Spiral\Admin\Project\Controllers;

use Domain\Project\Project;
use Spiral\Router\Annotation\Route;

final class ProjectController
{
    #[Route(route: '/api/admin/projects', name: 'api.admin.projects.index', methods: 'GET')]
    public function index(): array
    {
        return [
            [
                'name' => 'Project 1',
                'description' => 'Description 1',
            ],
            [
                'name' => 'Project 2',
                'description' => 'Description 2',
            ],
        ];
    }

    #[Route(route: '/api/admin/projects/<id>', name: 'api.admin.projects.show', methods: 'GET')]
    public function show(Project $project): array
    {
        return [
            'id' => $project->id()->toString(),
            'name' => 'Project 1',
            'description' => 'Description 1',
        ];
    }

    #[Route(route: '/api/admin/projects', name: 'api.admin.projects.create', methods: 'POST')]
    public function create(): array
    {
        return [
            'name' => 'Project 1',
            'description' => 'Description 1',
        ];
    }

    #[Route(route: '/api/admin/projects/<id>', name: 'api.admin.projects.update', methods: 'PUT')]
    public function update(Project $project): array
    {
        return [
            'id' => $project->id()->toString(),
            'name' => 'Project 1',
            'description' => 'Description 1',
        ];
    }

    #[Route(route: '/api/admin/projects/<id>', name: 'api.admin.projects.delete', methods: 'DELETE')]
    public function delete(Project $project): array
    {
        return [];
    }
}
