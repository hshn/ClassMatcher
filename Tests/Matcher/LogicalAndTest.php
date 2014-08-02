<?php

namespace Hshn\ClassMatcher\Tests\Matcher;

use Hshn\ClassMatcher\Matcher\LogicalAnd;

class LogicalAndTest extends MatcherTestCase
{
    /**
     * @test
     * @dataProvider provideTestData
     */
    public function testMatches($expectedResult, array $childResults)
    {
        $matchers = array_map(function ($childResult) {
            return $this->getMatcher($childResult);
        }, $childResults);

        $matcher = new LogicalAnd($matchers);

        $this->assertEquals($expectedResult, $matcher->matches('foo'));
    }

    /**
     * @return array
     */
    public function provideTestData()
    {
        return [
            [false, [false, false, false, true]],
            [true, [true, true, true]],
            [false, [false, false, false]],
        ];
    }
}
