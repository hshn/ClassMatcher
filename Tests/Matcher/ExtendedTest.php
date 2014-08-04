<?php


namespace Hshn\ClassMatcher\Tests\Matcher;


use Hshn\ClassMatcher\Matcher\Extended;

class ExtendedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider provideTestData
     */
    public function testMatches($class, $target, $expectedResult)
    {
        $matcher = new Extended($class);
        $this->assertEquals($expectedResult, $matcher->matches($target));
    }

    /**
     * @return array
     */
    public function provideTestData()
    {
        $bar = 'Hshn\ClassMatcher\Tests\Fixtures\Bar';
        $barExtended = 'Hshn\ClassMatcher\Tests\Fixtures\BarExtended';
        $barExtendedExtended = 'Hshn\ClassMatcher\Tests\Fixtures\BarExtendedExtended';
        $foo = 'Hshn\ClassMatcher\Tests\Fixtures\Foo';

        return [
            [$bar, $bar, false],
            [$bar, $barExtended, true],
            [$bar, $barExtendedExtended, true],
            [$barExtended, $barExtendedExtended, true],
            [$barExtendedExtended, $barExtended, false],
            [$barExtendedExtended, $bar, false],
            [$bar, $foo, false],
            [$barExtended, $bar, false],
            [$barExtended, $barExtended, false],
            [$barExtended, $foo, false],
            [$foo, $bar, false],
            [$foo, $barExtended, false],
            [$foo, $foo, false],
        ];
    }
}
