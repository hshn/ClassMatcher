<?php

namespace Hshn\ClassMatcher;

use Hshn\ClassMatcher\Matcher\Anything;
use Hshn\ClassMatcher\Matcher\EqualsTo;
use Hshn\ClassMatcher\Matcher\Extended;
use Hshn\ClassMatcher\Matcher\Implemented;
use Hshn\ClassMatcher\Matcher\LogicalAnd;
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
     * @return EqualsTo
     */
    public function equalsTo($class)
    {
        return new EqualsTo($class);
    }

    /**
     * @param string $class
     *
     * @return Extended
     */
    public function extended($class)
    {
        return new Extended($class);
    }

    /**
     * @param string $class
     *
     * @return Implemented
     */
    public function implemented($class)
    {
        return new Implemented($class);
    }

    /**
     * @return Anything
     */
    public function anything()
    {
        return new Anything();
    }
}
