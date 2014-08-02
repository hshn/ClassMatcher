<?php

namespace Hshn\ClassMatcher;

class ClassMatcher
{
    /**
     * @return ClassMatcherBuilder
     */
    static public function createBuilder()
    {
        return new ClassMatcherBuilder();
    }
}
