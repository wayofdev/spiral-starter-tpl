<?php

declare(strict_types=1);

namespace Bridge\Spiral\Bootloaders;

use Bridge\Spiral\Interceptors\UuidParametersConverterInterceptor;
use Spiral\Bootloader\DomainBootloader;
use Spiral\Core\CoreInterface;
use Spiral\Cycle\Interceptor\CycleInterceptor;
use Spiral\DataGrid\Interceptor\GridInterceptor;
use Spiral\Domain\GuardInterceptor;

/**
 * @see https://spiral.dev/docs/http-interceptors
 */
final class AppBootloader extends DomainBootloader
{
    protected static function defineInterceptors(): array
    {
        return [
            CycleInterceptor::class,
            GridInterceptor::class,
            GuardInterceptor::class,

            // Allows to convert uuid string to UuidInterface instance
            UuidParametersConverterInterceptor::class,
        ];
    }

    public function defineSingletons(): array
    {
        return [
            CoreInterface::class => [self::class, 'domainCore'],
        ];
    }
}
