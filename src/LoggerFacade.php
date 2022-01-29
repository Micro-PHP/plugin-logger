<?php

namespace Micro\Plugin\Logger;

use Micro\Plugin\Logger\Business\Provider\LoggerProviderInterface;
use Psr\Log\LoggerInterface;

class LoggerFacade implements LoggerFacadeInterface
{
    /**
     * @param LoggerProviderInterface $loggerProvider
     */
    public function __construct(private LoggerProviderInterface $loggerProvider)
    {
    }

    /**
     * @param string $logger
     *
     * @return LoggerInterface
     */
    public function getLogger(string $logger = self::LOGGER_DEFAULT): LoggerInterface
    {
        return $this->loggerProvider->getLogger($logger);
    }
}
