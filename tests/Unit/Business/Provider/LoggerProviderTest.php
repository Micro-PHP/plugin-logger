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

namespace Micro\Plugin\Logger\Test\Unit\Business\Provider;

use Micro\Framework\Kernel\KernelInterface;
use Micro\Plugin\Logger\Business\Provider\LoggerProvider;
use Micro\Plugin\Logger\Configuration\LoggerPluginConfigurationInterface;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class LoggerProviderTest extends TestCase
{
    public function testGetLogger()
    {
        $kernel = $this->createMock(KernelInterface::class);
        $loggerPluginConfiguration = $this->createMock(LoggerPluginConfigurationInterface::class);

        $loggerProvider = new LoggerProvider(
            $kernel,
            $loggerPluginConfiguration
        );

        $this->assertInstanceOf(LoggerInterface::class, $loggerProvider->getLogger('default'));
    }
}
