<?php

namespace Siler\Test;

use PHPUnit\Framework\TestCase;
use function Siler\Dotenv\env as env;

class DotenvTest extends TestCase
{
    public function testEnv()
    {
        $lines = \Siler\Dotenv\init(__DIR__.'/../fixtures');

        $this->assertEquals(1, count($lines));
        $this->assertEquals('FOO=bar', $lines[0]);
        $this->assertEquals($_SERVER, env());
        $this->assertEquals('bar', env('FOO'));
        $this->assertEquals('baz', env('BAR', 'baz'));
        $this->assertNull(env('BAR'));
    }
}
