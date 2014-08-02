<?php

namespace Hshn\ClassMatcher\Tests\Matcher;

class MatcherTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @param bool $matches
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMatcher($matches)
    {
        $matcher = $this->getMock('Hshn\ClassMatcher\MatcherInterface');

        $matcher
            ->expects($this->any())
            ->method('matches')
            ->will($this->returnValue($matches));

        return $matcher;
    }
}
