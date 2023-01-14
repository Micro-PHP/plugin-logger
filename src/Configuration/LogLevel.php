<?php

declare(strict_types=1);

/*
 *  This file is part of the Micro framework package.
 *
 *  (c) Stanislau Komar <kost@micro-php.net>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Micro\Plugin\Logger\Configuration;

use Psr\Log\LogLevel as PsrLogLevel;

enum LogLevel
{
    case DEBUG;
    case CRITICAL;
    case EMERGENCY;
    case ALERT;
    case ERROR;
    case INFO;
    case WARNING;
    case NOTICE;

    public function level(): string
    {
        return match ($this) {
            LogLevel::DEBUG => PsrLogLevel::DEBUG,
            LogLevel::CRITICAL => PsrLogLevel::CRITICAL,
            LogLevel::EMERGENCY => PsrLogLevel::EMERGENCY,
            LogLevel::ALERT => PsrLogLevel::ALERT,
            LogLevel::ERROR => PsrLogLevel::ERROR,
            LogLevel::INFO => PsrLogLevel::INFO,
            LogLevel::WARNING => PsrLogLevel::WARNING,
            LogLevel::NOTICE => PsrLogLevel::NOTICE,
        };
    }

    public static function getLevelFromString(string $logLevel): LogLevel
    {
        $toLower = mb_strtolower($logLevel);
        switch ($toLower) {
            case PsrLogLevel::DEBUG:
                return LogLevel::DEBUG;
            case PsrLogLevel::CRITICAL:
                return LogLevel::CRITICAL;
            case PsrLogLevel::EMERGENCY:
                return LogLevel::EMERGENCY;
            case PsrLogLevel::ALERT:
                return LogLevel::ALERT;
            case PsrLogLevel::ERROR:
                return LogLevel::ERROR;
            case PsrLogLevel::INFO:
                return LogLevel::INFO;
            case PsrLogLevel::WARNING:
                return LogLevel::WARNING;
            case PsrLogLevel::NOTICE:
                return LogLevel::NOTICE;
            default:
                throw new \RuntimeException('Invalid log level value `%s`.');
        }
    }
}
