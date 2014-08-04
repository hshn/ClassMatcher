<?php


namespace Hshn\ClassMatcher\Matcher;

use Hshn\ClassMatcher\MatcherInterface;

/**
 * @author Shota Hoshino <lga0503@gmail.com>
 */
class Extended implements MatcherInterface
{
    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function matches($class)
    {
        $parentClass = (new \ReflectionClass($class))->getParentClass();

        return $parentClass && $this->isMatched($parentClass, $this->class);
    }

    /**
     * @param \ReflectionClass $class
     * @param string           $target
     *
     * @return bool
     */
    private function isMatched(\ReflectionClass $class, $target)
    {
        if ($class->getName() === $target) {
            return true;
        } elseif ($parentClass = $class->getParentClass()) {
            return $this->isMatched($parentClass, $target);
        }

        return false;
    }
}
