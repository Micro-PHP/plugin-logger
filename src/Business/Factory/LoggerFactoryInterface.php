<?php

namespace Micro\Plugin\Logger\Business\Factory;

use Psr\Log\LoggerInterface;

interface LoggerFactoryInterface
{
    /**
     * @param string $loggerName
     *
     * @return LoggerInterface
     */
    public function create(string $loggerName): LoggerInterface;
}
