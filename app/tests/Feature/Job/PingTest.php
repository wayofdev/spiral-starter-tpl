<?php

declare(strict_types=1);

namespace Tests\Feature\Job;

use Bridge\Spiral\Public\Ping\Jobs\Ping;
use PHPUnit\Framework\Attributes\Test;
use Spiral\Queue\Exception\InvalidArgumentException;
use Spiral\Testing\Queue\FakeQueue;
use Tests\TestCase;

final class PingTest extends TestCase
{
    private FakeQueue $connection;

    /**
     * @throws InvalidArgumentException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->connection = $this->fakeQueue()->getConnection();
    }

    #[Test]
    public function job_pushed(): void
    {
        $this->connection->push(Ping::class, ['value' => 'hello world']);

        $this->connection->assertPushed(
            Ping::class,
            fn (array $data) => $data['handler'] instanceof Ping && $data['payload']['value'] === 'hello world'
        );
    }
}
