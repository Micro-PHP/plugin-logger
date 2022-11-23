<?php

namespace Micro\Plugin\Logger;

use Micro\Framework\Kernel\Configuration\PluginConfiguration;
use Monolog\Logger;

class LoggerPluginConfiguration extends PluginConfiguration
{
    const LOGGER_NAME_DEFAULT = 'default';

    const LOGGER_LOG_LEVEL_DEFAULT = 'debug';

    const LOGGER_LOG_LEVEL = 'LOGGER_LOG_LEVEL';

    const LOGGER_LOG_FILE = 'LOGGER_FILE';

    const LOG_LEVEL_VALUES = [
        'DEBUG'         => Logger::DEBUG,
        'CRITICAL'      => Logger::CRITICAL,
        'EMERGENCY'     => Logger::EMERGENCY,
        'ALERT'         => Logger::ALERT,
        'ERROR'         => Logger::ERROR,
        'INFO'          => Logger::INFO,
        'WARNING'       => Logger::WARNING,
        'NOTICE'        => Logger::NOTICE,
    ];

    /**
     * @return string
     */
    public function getLogFile(): string
    {
        return $this->configuration->get(self::LOGGER_LOG_FILE);
    }

    /**
     * @return string
     */
    public function getLoggerDefaultName(): string
    {
        return self::LOGGER_NAME_DEFAULT;
    }

    /**
     * @return int
     */
    public function getLogLevel(): int
    {
        $levelString = $this->configuration->get(self::LOGGER_LOG_LEVEL, self::LOGGER_LOG_LEVEL_DEFAULT);

        return self::LOG_LEVEL_VALUES[mb_strtoupper($levelString)];
    }
}
