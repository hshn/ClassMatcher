ClassMatcher
============

[![Build Status](https://travis-ci.org/hshn/ClassMatcher.svg?branch=travis)](https://travis-ci.org/hshn/ClassMatcher)

## Usage

```php
<?php

use Hshn\ClassMatcher\ClassMatcher;

$builder = ClassMatcher::createBuilder();

$matcher = $builder->logicalOr([
    $builder->equalsTo('Foo'),
    $builder->implemented('FooInterface'),
    $builder->extended('Foo'),
    $builder->logicalAnd([
        $builder->anything()
    ]),
]);

if ($matcher->matches('FooExtended')) {

} else {

}
```
