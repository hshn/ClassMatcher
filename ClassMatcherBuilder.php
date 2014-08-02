<?php

namespace Hshn\ClassMatcher;

use Hshn\ClassMatcher\Matcher\Anything;
use Hshn\ClassMatcher\Matcher\IsInstanceOf;
use Hshn\ClassMatcher\Matcher\LogicalAnd;
use Hshn\ClassMatcher\Matcher\ClassName;
use Hshn\ClassMatcher\Matcher\LogicalNot;
use Hshn\ClassMatcher\Matcher\LogicalOr;

class ClassMatcherBuilder
{
    /**
     * @param MatcherInterface[] $matchers
     *
     * @return LogicalOr
     */
    public function logicalOr(array $matchers)
    {
        return new LogicalOr($matchers);
    }

    /**
     * @param MatcherInterface[] $matchers
     *
     * @return LogicalAnd
     */
    public function logicalAnd(array $matchers)
    {
        return new LogicalAnd($matchers);
    }

    /**
     * @param MatcherInterface $matcher
     *
     * @return LogicalNot
     */
    public function logicalNot(MatcherInterface $matcher)
    {
        return new LogicalNot($matcher);
    }

    /**
     * @param string $class
     *
     * @return ClassName
     */
    public function className($class)
    {
        return new ClassName($class);
    }

    /**
     * @param string $classOrInterface
     *
     * @return IsInstanceOf
     */
    public function isInstanceOf($classOrInterface)
    {
        return new IsInstanceOf($classOrInterface);
    }

    /**
     * @return Anything
     */
    public function anything()
    {
        return new Anything();
    }
}
