<?php


namespace Hshn\ClassMatcher\Matcher;

use Hshn\ClassMatcher\MatcherInterface;

/**
 * @author Shota Hoshino <lga0503@gmail.com>
 */
class Implemented implements MatcherInterface
{
    /**
     * @var string
     */
    private $interface;

    /**
     * @param string $interface
     */
    public function __construct($interface)
    {
        $this->interface = $interface;
    }

    /**
     * {@inheritdoc}
     */
    public function matches($class)
    {
        return in_array($this->interface, class_implements($class), true);
    }
}
