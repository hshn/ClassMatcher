<?php

namespace Hshn\ClassMatcher\Matcher;

use Hshn\ClassMatcher\MatcherInterface;

/**
 * @author Shota Hoshino <lga0503@gmail.com>
 */
class Anything implements MatcherInterface
{
    /**
     * {@inheritdoc}
     */
    public function matches($class)
    {
        return true;
    }
}
