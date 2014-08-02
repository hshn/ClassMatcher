<?php

namespace Hshn\ClassMatcher\Matcher;

use Hshn\ClassMatcher\MatcherInterface;

/**
 * @author Shota Hoshino <lga0503@gmail.com>
 */
class LogicalNot implements MatcherInterface
{
    /**
     * @var \Hshn\ClassMatcher\MatcherInterface
     */
    private $matcher;

    /**
     * @param MatcherInterface $matcher
     */
    public function __construct(MatcherInterface $matcher)
    {
        $this->matcher = $matcher;
    }

    /**
     * {@inheritdoc}
     */
    public function matches($class)
    {
        return !$this->matcher->matches($class);
    }
}
