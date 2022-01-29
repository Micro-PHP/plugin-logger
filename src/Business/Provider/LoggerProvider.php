<?php

namespace Micro\Plugin\Logger\Business\Provider;

use Micro\Plugin\Logger\Business\Factory\LoggerFactoryInterface;
use Psr\Log\LoggerInterface;

class LoggerProvider implements LoggerProviderInterface
{
    /**
     * @var array<string, LoggerInterface>
     */
    private array $loggerCollection;

    /**
     * @param LoggerFactoryInterface $loggerFactory
     */
    public function __construct(private LoggerFactoryInterface $loggerFactory)
    {
        $this->loggerCollection = [];
    }

    /**
     * {@inheritDoc}
     */
    public function getLogger(string $loggerName): LoggerInterface
    {
        if(!array_key_exists($loggerName, $this->loggerCollection)) {
            $this->loggerCollection[$loggerName] = $this->loggerFactory->create($loggerName);
        }

        return $this->loggerCollection[$loggerName];
    }
}
