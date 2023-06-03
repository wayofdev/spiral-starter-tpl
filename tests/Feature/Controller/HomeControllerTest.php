<?php

declare(strict_types=1);

namespace Tests\Feature\Controller;

use Spiral\Testing\Http\FakeHttp;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    private FakeHttp $http;

    protected function setUp(): void
    {
        parent::setUp();

        $this->http = $this->fakeHttp();
    }

    /**
     * @test
     */
    public function default_action_works(): void
    {
        $this->http
            ->get('/')
            ->assertOk()
            ->assertBodyContains('Spiral Framework is a high-performance, intuitive platform for building scalable');
    }

    /**
     * @test
     */
    public function interact_with_console(): void
    {
        $output = $this->runCommand('views:reset');

        $this->assertStringContainsString('cache', $output);
    }
}
