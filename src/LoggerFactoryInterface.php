<?php

namespace Micro\Plugin\Logger;

use Psr\Log\LoggerInterface;

interface LoggerFactoryInterface
{
    /**
     * @return LoggerInterface
     */
    public function create(): LoggerInterface;
}
