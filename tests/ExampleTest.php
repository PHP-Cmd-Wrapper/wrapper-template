<?php

namespace CmdWrapper\Wrapper\Tests;

use ArtARTs36\ShellCommand\Executors\TestExecutor;
use ArtARTs36\ShellCommand\ShellCommander;
use CmdWrapper\Wrapper\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @covers \CmdWrapper\Wrapper\Example::version
     */
    public function testVersion(): void
    {
        $wrapper = new Example(
            new ShellCommander(),
            TestExecutor::fromSuccess('1.0.0'),
        );

        self::assertEquals('1.0.0', $wrapper->version());
    }
}
