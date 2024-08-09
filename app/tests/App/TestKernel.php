<?php

declare(strict_types=1);

namespace Tests\App;

use App\Bridge\Spiral\Kernel;
use Spiral\Testing\TestableKernelInterface;
use Spiral\Testing\Traits\TestableKernel;

class TestKernel extends Kernel implements TestableKernelInterface
{
    use TestableKernel;
}
