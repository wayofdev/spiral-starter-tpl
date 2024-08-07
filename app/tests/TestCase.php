<?php

declare(strict_types=1);

namespace Tests;

use Spiral\Config\ConfiguratorInterface;
use Spiral\Config\Patch\Set;
use Spiral\Core\Container;
use Spiral\Testing\TestableKernelInterface;
use Spiral\Testing\TestCase as BaseTestCase;
use Spiral\Translator\TranslatorInterface;
use Tests\App\TestKernel;
use Throwable;

class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        $this->beforeBooting(static function (ConfiguratorInterface $config): void {
            if (! $config->exists('session')) {
                return;
            }

            $config->modify('session', new Set('handler', null));
        });

        parent::setUp();

        $container = $this->getContainer();

        if ($container->has(TranslatorInterface::class)) {
            $container->get(TranslatorInterface::class)->setLocale('en');
        }
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Uncomment this line if you want to clean up runtime directory.
        // $this->cleanUpRuntimeDirectory();
    }

    /**
     * @throws Throwable
     */
    public function createAppInstance(Container $container = new Container()): TestableKernelInterface
    {
        return TestKernel::create(
            directories: $this->defineDirectories(
                $this->rootDirectory(),
            ),
            container: $container,
        );
    }

    public function rootDirectory(): string
    {
        return __DIR__ . '/..';
    }

    public function defineDirectories(string $root): array
    {
        return [
            'root' => $root,
            'app' => $root . '/src',
            'config' => $root . '/config',
            'public' => $root . '/public',
            'runtime' => $root . '/runtime',
            'views' => $root . '/views',
        ];
    }
}
