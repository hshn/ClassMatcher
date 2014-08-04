<?php

namespace Hshn\ClassMatcher;

class ClassMatcher
{
    /**
     * @return ClassMatcherBuilder
     */
    public static function createBuilder()
    {
        return new ClassMatcherBuilder();
    }
}
