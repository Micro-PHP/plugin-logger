<?php

namespace Micro\Plugin\Logger;

use Micro\Component\DependencyInjection\Container;
use Micro\Framework\Kernel\Plugin\AbstractPlugin;
use Micro\Plugin\Logger\Business\Factory\LoggerFactory;
use Micro\Plugin\Logger\Business\Factory\LoggerFactoryInterface;
use Micro\Plugin\Logger\Business\Provider\LoggerProvider;
use Micro\Plugin\Logger\Business\Provider\LoggerProviderInterface;

abstract class LoggerPlugin extends AbstractPlugin
{
    /**
     * @var LoggerProviderInterface|null
     */
    private ?LoggerProviderInterface $loggerProvider = null;

    /**
     * {@inheritDoc}
     */
    public function provideDependencies(Container $container): void
    {
        $container->register(LoggerFacadeInterface::class, function (Container $container) {
            return $this->createLoggerFacade();
        });
    }

    /**
     * @return LoggerProviderInterface
     */
    protected function getLoggerProvider(): LoggerProviderInterface
    {
        if(!$this->loggerProvider) {
            $this->loggerProvider = $this->createLoggerProvider();
        }

        return $this->loggerProvider;
    }

    /**
     * @return LoggerProviderInterface
     */
    protected function createLoggerProvider(): LoggerProviderInterface
    {
        return new LoggerProvider(
            $this->createLoggerFactory()
        );
    }

    /**
     * @return LoggerFacadeInterface
     */
    protected function createLoggerFacade(): LoggerFacadeInterface
    {
        return new LoggerFacade($this->getLoggerProvider());
    }

    /**
     * @return LoggerFactoryInterface
     */
    abstract protected function createLoggerFactory(): LoggerFactoryInterface;
}
