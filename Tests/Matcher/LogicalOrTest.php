<?php

namespace Hshn\ClassMatcher\Tests\Matcher;

use Hshn\ClassMatcher\Matcher\LogicalOr;

class LogicalOrTest extends MatcherTestCase
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

        $matcher = new LogicalOr($matchers);

        $this->assertEquals($expectedResult, $matcher->matches('foo'));
    }

    /**
     * @return array
     */
    public function provideTestData()
    {
        return [
            [true, [false, false, false, true]],
            [true, [true, true, true]],
            [false, [false, false, false]],
        ];
    }
}
