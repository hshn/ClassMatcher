<?php

namespace Hshn\ClassMatcher\Tests\Matcher;

use Hshn\ClassMatcher\Matcher\ClassName;

class ClassNameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider provideTestData
     */
    public function testMatches($expectedResult, $class, $testClass, $includesSubclasses = true)
    {
        $matcher = new ClassName($class, $includesSubclasses);
        $this->assertEquals($expectedResult, $matcher->matches($testClass));
    }

    /**
     * @return array
     */
    public function provideTestData()
    {
        return [
            // includes subclasses
            [true,  'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\Bar'],
            [true,  'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended'],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\Foo'],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\Bar'],
            [true,  'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended'],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\Foo'],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\Bar'],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended'],
            [true,  'Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\Foo'],
            // excludes subclasses
            [true,  'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\Bar', false],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', false],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\Foo', false],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\Bar', false],
            [true,  'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', false],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\Foo', false],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\Bar', false],
            [false, 'Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', false],
            [true,  'Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\Foo', false],
        ];
    }
}
