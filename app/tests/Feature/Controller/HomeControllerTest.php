<?php

declare(strict_types=1);

namespace Tests\Feature\Controller;

use PHPUnit\Framework\Attributes\Test;
use Spiral\Testing\Http\FakeHttp;
use Tests\TestCase;

use function strip_tags;

final class HomeControllerTest extends TestCase
{
    private FakeHttp $http;

    protected function setUp(): void
    {
        parent::setUp();

        $this->http = $this->fakeHttp();
    }

    #[Test]
    public function default_action_works(): void
    {
        $response = $this->http->get('/')->assertOk();

        self::assertStringContainsString(
            'The PHP Framework for future Innovators',
            strip_tags((string) $response->getOriginalResponse()->getBody())
        );
    }

    #[Test]
    public function interact_with_console(): void
    {
        $output = $this->runCommand('views:reset');

        self::assertStringContainsString('cache', $output);
    }
}
