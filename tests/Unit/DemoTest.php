<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

class DemoTest extends TestCase
{
    /**
     * @test
     */
    public function demo(): void
    {
        $expected = true;
        $actual = false;

        $this->assertTrue($expected);
        $this->assertFalse($actual);
    }
}
