<?php

namespace Hshn\ClassMatcher\Tests\Matcher;
use Hshn\ClassMatcher\Matcher\LogicalNot;

/**
 * @author Shota Hoshino <lga0503@gmail.com>
 */
class LogicalNotTest extends MatcherTestCase
{
    /**
     * @test
     */
    public function testMatches()
    {
        $matcher = new LogicalNot($this->getMatcher(true));
        $this->assertFalse($matcher->matches('Foo'));

        $matcher = new LogicalNot($this->getMatcher(false));
        $this->assertTrue($matcher->matches('Foo'));
    }
}
