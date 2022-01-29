<?php

namespace Micro\Plugin\Logger;

use Psr\Log\LoggerInterface;

interface LoggerFacadeInterface
{
    public const LOGGER_DEFAULT = 'default';

    /**
     * @param string $logger
     * @return LoggerInterface
     */
    public function getLogger(string $logger = self::LOGGER_DEFAULT): LoggerInterface;
}
