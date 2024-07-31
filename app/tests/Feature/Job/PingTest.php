<?php

declare(strict_types=1);

namespace Tests\Feature\Job;

use App\Endpoint\Job\Ping;
use Spiral\Testing\Queue\FakeQueue;
use Tests\TestCase;

class PingTest extends TestCase
{
    private FakeQueue $connection;

    protected function setUp(): void
    {
        parent::setUp();

        $this->connection = $this->fakeQueue()->getConnection();
    }

    /**
     * @test
     */
    public function job_pushed(): void
    {
        $this->connection->push(Ping::class, ['value' => 'hello world']);

        $this->connection->assertPushed(
            Ping::class,
            fn (array $data) => $data['handler'] instanceof Ping && $data['payload']['value'] === 'hello world'
        );
    }
}
