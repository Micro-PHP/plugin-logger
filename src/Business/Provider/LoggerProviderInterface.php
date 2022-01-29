<?php

namespace Micro\Plugin\Logger\Business\Provider;

use Psr\Log\LoggerInterface;

interface LoggerProviderInterface
{
    /**
     * @param string $loggerName
     *
     * @return LoggerInterface
     */
    public function getLogger(string $loggerName): LoggerInterface;
}
