<?php

namespace Hshn\ClassMatcher\Tests\Matcher;

use Hshn\ClassMatcher\Matcher\IsInstanceOf;
use Hshn\ClassMatcher\Tests\Fixtures\Bar;
use Hshn\ClassMatcher\Tests\Fixtures\BarExtended;
use Hshn\ClassMatcher\Tests\Fixtures\Foo;

class IsInstanceOfTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider provideTestData
     */
    public function testMatches($className, $targetClass, $expectedResult)
    {
        $matcher = new IsInstanceOf($className);
        $this->assertEquals($expectedResult, $matcher->matches($targetClass));
    }

    /**
     * @return array
     */
    public function provideTestData()
    {
        return [
            ['Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\Bar', true],
            ['Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', true],
            ['Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\BarInterface', false],
            ['Hshn\ClassMatcher\Tests\Fixtures\Bar', 'Hshn\ClassMatcher\Tests\Fixtures\Foo', false],

            ['Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\Bar', false],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', true],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\BarInterface', false],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarExtended', 'Hshn\ClassMatcher\Tests\Fixtures\Foo', false],

            ['Hshn\ClassMatcher\Tests\Fixtures\BarInterface', 'Hshn\ClassMatcher\Tests\Fixtures\Bar', true],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarInterface', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', true],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarInterface', 'Hshn\ClassMatcher\Tests\Fixtures\BarInterface', true],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarInterface', 'Hshn\ClassMatcher\Tests\Fixtures\Foo', false],

            ['Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\Bar', false],
            ['Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended', false],
            ['Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\BarInterface', false],
            ['Hshn\ClassMatcher\Tests\Fixtures\Foo', 'Hshn\ClassMatcher\Tests\Fixtures\Foo', true],


            ['Hshn\ClassMatcher\Tests\Fixtures\Bar', new Bar(), true],
            ['Hshn\ClassMatcher\Tests\Fixtures\Bar', new BarExtended(), true],
            ['Hshn\ClassMatcher\Tests\Fixtures\Bar', new Foo(), false],

            ['Hshn\ClassMatcher\Tests\Fixtures\BarExtended', new Bar(), false],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarExtended', new BarExtended(), true],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarExtended', new Foo(), false],

            ['Hshn\ClassMatcher\Tests\Fixtures\BarInterface', new Bar(), true],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarInterface', new BarExtended(), true],
            ['Hshn\ClassMatcher\Tests\Fixtures\BarInterface', new Foo(), false],

            ['Hshn\ClassMatcher\Tests\Fixtures\Foo', new Bar(), false],
            ['Hshn\ClassMatcher\Tests\Fixtures\Foo', new BarExtended(), false],
            ['Hshn\ClassMatcher\Tests\Fixtures\Foo', new Foo(), true],
        ];
    }
}
