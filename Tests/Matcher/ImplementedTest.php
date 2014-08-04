<?php


namespace Hshn\ClassMatcher\Tests\Matcher;


use Hshn\ClassMatcher\Matcher\Implemented;

class ImplementedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider provideTestData
     */
    public function testMatches($interface, $class, $expectedResult)
    {
        $matcher = new Implemented($interface);

        $this->assertEquals($expectedResult, $matcher->matches($class));
    }

    /**
     *
     */
    public function provideTestData()
    {
        $bar = 'Hshn\ClassMatcher\Tests\Fixtures\Bar';
        $foo = 'Hshn\ClassMatcher\Tests\Fixtures\Foo';
        $barExtended = 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended';
        $barInterface = 'Hshn\ClassMatcher\Tests\Fixtures\BarInterface';

        return [
            [$barInterface, $bar, true],
            [$barInterface, $foo, false],
            [$barInterface, $barExtended, true],
        ];
    }
}
