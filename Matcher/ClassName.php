<?php

namespace Hshn\ClassMatcher\Matcher;

use Hshn\ClassMatcher\MatcherInterface;

/**
 * @author Shota Hoshino <lga0503@gmail.com>
 */
class ClassName implements MatcherInterface
{
    /**
     * @var string
     */
    private $class;

    /**
     * @var bool
     */
    private $includesSubClass;

    /**
     * @param string $class
     * @param bool   $includesSubClass
     */
    public function __construct($class, $includesSubClass = false)
    {
        $this->class = $class;
        $this->includesSubClass = $includesSubClass;
    }

    /**
     * {@inheritdoc}
     */
    public function matches($class)
    {
        if ($class === $this->class) {
            return true;
        }

        if (!$this->includesSubClass) {
            return false;
        }

        return is_subclass_of($class, $this->class);
    }
}
