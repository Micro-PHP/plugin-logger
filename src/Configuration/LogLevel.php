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

enum LogLevel: string
{
    case DEBUG = PsrLogLevel::DEBUG;
    case CRITICAL = PsrLogLevel::CRITICAL;
    case EMERGENCY = PsrLogLevel::EMERGENCY;
    case ALERT = PsrLogLevel::ALERT;
    case ERROR = PsrLogLevel::ERROR;
    case INFO = PsrLogLevel::INFO;
    case WARNING = PsrLogLevel::WARNING;
    case NOTICE = PsrLogLevel::NOTICE;
}
