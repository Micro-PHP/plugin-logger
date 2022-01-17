<?php

namespace Micro\Plugin\Logger;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\AbstractPlugin;
use Micro\Plugin\Logger\Impl\LoggerFactory;
use \Closure;

class LoggerPlugin extends AbstractPlugin
{
    public const SERVICE_LOGGER = 'logger';

    /**
     * {@inheritDoc}
     */
    public function provideDependencies(Container $container): void
    {
        $container->register(self::SERVICE_LOGGER, $this->createLoggerServiceCallback());
    }

    /**
     * @return Closure
     */
    private function createLoggerServiceCallback(): Closure
    {
        return function (Container $container)
        {
            return $this->createLoggerFactory()->create();
        };
    }

    /**
     * @return LoggerFactoryInterface
     */
    private function createLoggerFactory(): LoggerFactoryInterface
    {
        return new LoggerFactory($this->configuration);
    }
}
