<?php

namespace Hshn\ClassMatcher\Tests\Matcher;

use Hshn\ClassMatcher\Matcher\Callback;

class CallbackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testMatcher()
    {
        $className = 'Foo';

        $matcher = new Callback(function ($class) use ($className) {
            $this->assertSame($class, $class);

            return true;
        });

        $this->assertTrue($matcher->matches($className));
    }
}
