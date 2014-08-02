<?php

namespace Hshn\ClassMatcher\Matcher;

/**
 * @author Shota Hoshino <lga0503@gmail.com>
 */
class IsInstanceOf extends ClassName
{
    /**
     * {@inheritdoc}
     */
    public function matches($object)
    {
        if (is_object($object)) {
            return $object instanceof $this->class;
        } elseif (is_string($object)) {
            return parent::matches($object)
                || is_subclass_of($object, $this->class)
                || in_array($this->class, class_implements($object), true);
        } else {
            return false;
        }
    }
}
