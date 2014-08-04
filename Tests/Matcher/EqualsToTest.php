<?php

namespace Hshn\ClassMatcher\Tests\Matcher;

use Hshn\ClassMatcher\Matcher\EqualsTo;

class EqualsToTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider provideTestData
     */
    public function testMatches($expectedResult, $class, $testClass)
    {
        $matcher = new EqualsTo($class);
        $this->assertEquals($expectedResult, $matcher->matches($testClass));
    }

    /**
     * @return array
     */
    public function provideTestData()
    {
        return [
            [true,  'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\Bar'],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\BarInterface'],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended'],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\Foo'],
        ];
    }
}
