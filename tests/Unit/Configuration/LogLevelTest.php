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

namespace Micro\Plugin\Logger\Test\Unit\Configuration;

use Micro\Plugin\Logger\Configuration\LogLevel;
use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel as PsrLogLevel;

class LogLevelTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testLevel(string $level)
    {
        if ('not_registered_level' === $level) {
            $this->expectException(\RuntimeException::class);
        }

        $levelObj = LogLevel::getLevelFromString($level);

        $this->assertEquals($level, $levelObj->level());
    }

    public function dataProvider()
    {
        return [
            [PsrLogLevel::DEBUG],
            [PsrLogLevel::CRITICAL],
            [PsrLogLevel::EMERGENCY],
            [PsrLogLevel::ALERT],
            [PsrLogLevel::ERROR],
            [PsrLogLevel::INFO],
            [PsrLogLevel::WARNING],
            [PsrLogLevel::NOTICE],
            ['not_registered_level'],
        ];
    }
}
