<?php

namespace Hshn\ClassMatcher\Matcher;

use Hshn\ClassMatcher\MatcherInterface;

/**
 * @author Shota Hoshino <lga0503@gmail.com>
 */
class OrMatcher implements MatcherInterface
{
    /**
     * @var \Hshn\ClassMatcher\MatcherInterface[]
     */
    private $matchers;

    /**
     * @param MatcherInterface[] $matchers
     */
    public function __construct(array $matchers)
    {
        $this->matchers = $matchers;
    }

    /**
     * {@inheritdoc}
     */
    public function matches($class)
    {
        foreach ($this->matchers as $matcher) {
            if ($matcher->matches($class)) {
                return true;
            }
        }

        return false;
    }
}
