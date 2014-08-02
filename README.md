ClassMatcher
============

## Usage

```php
<?php

use Hshn\ClassMatcher\ClassMatcher;

$builder = ClassMatcher::createBuilder();

$matcher = $builder->logicalOr([
    $builder->isInstanceOf('Foo'),
    $builder->className('Bar')
]);

if ($matcher->matches($objectOrClass)) {

} else {

}
```
