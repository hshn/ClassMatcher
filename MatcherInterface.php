<?php

namespace Hshn\ClassMatcher;

interface MatcherInterface
{
    /**
     * @param string $class class name
     *
     * @return bool
     */
    public function matches($class);
}
