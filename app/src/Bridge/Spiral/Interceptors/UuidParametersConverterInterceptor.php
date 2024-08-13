<?php

declare(strict_types=1);

namespace Bridge\Spiral\Interceptors;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use ReflectionMethod;
use Spiral\Core\CoreInterceptorInterface;
use Spiral\Core\CoreInterface;

final class UuidParametersConverterInterceptor implements CoreInterceptorInterface
{
    public function process(string $controller, string $action, array $parameters, CoreInterface $core): mixed
    {
        $refMethod = new ReflectionMethod($controller, $action);

        // Iterate all Controller action arguments
        foreach ($refMethod->getParameters() as $parameter) {
            // If an arguments has Ramsey\Uuid\UuidInterface type hint.
            if ($parameter->getType()->getName() === UuidInterface::class) {
                // Replace argument value with Uuid instance.
                $parameters[$parameter->getName()] = Uuid::fromString($parameters[$parameter->getName()]);
            }
        }

        return $core->callAction($controller, $action, $parameters);
    }
}
