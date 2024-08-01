<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class DemoTest extends TestCase
{
    #[Test]
    public function demo(): void
    {
        $expected = true;
        $actual = false;

        self::assertTrue($expected);
        self::assertFalse($actual);
    }
}
