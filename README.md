# DynamicString

> Generate random strings from templates.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/lastguest/DynamicString/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/lastguest/DynamicString/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/lastguest/dynamic-string/v/stable.svg)](https://packagist.org/packages/lastguest/dynamic-string) [![Total Downloads](https://poser.pugx.org/lastguest/dynamic-string/downloads.svg)](https://packagist.org/packages/lastguest/dynamic-string) [![Latest Unstable Version](https://poser.pugx.org/lastguest/dynamic-string/v/unstable.svg)](https://packagist.org/packages/lastguest/dynamic-string) [![License](https://poser.pugx.org/lastguest/dynamic-string/license.svg)](https://packagist.org/packages/lastguest/dynamic-string)

## Installation

Install via [composer](https://getcomposer.org/download/):

```bash
$ composer require lastguest/dynamic-string
```

### How to use

```php
$generator = new DynamicString();
echo $generator->render("I want a (fried|double|spicy) (tuna|salmon|crab) (sushi|(ura|te)maki), please.");
```

### Templates

Use `()` for define a group that will be replaced by one of the contained alternatives, random selected.

The `|` character is used as a separator for multiple choices.


This template will render `Yes` or `No` randomly :

```
(Yes|No)
```

Groups can be nested, they will resolved with a deep-first order.

This template will render `Finger`, `Fingers`, `Hand`, `Hands` randomly :

```
(Finge(r|rs)|Han(d|ds))
```

A complete template for generate random Sushi orders :

```
I want a (fried|double|spicy) (tuna|salmon|crab) (sushi|(ura|te)maki), please.
```

Some outputs :

```
I want a spicy salmon sushi, please.
I want a double tuna uramaki, please.
I want a double salmon temaki, please.
I want a spicy crab sushi, please.
```

### Changing default group envelope and separator

You can change the default group envelope and separator in the `DynamicString` constructor.

```php
$generator = new DynamicString('<>',',');
echo $generator->render("<public,protected,private> function(<string,array,callable> myVar){};");
```

Output:

```
private function(array myVar){};
```

### Other examples

See [wiki](https://github.com/lastguest/DynamicString/wiki) for other examples. (a fun fantasy story generator)

## License (MIT)

Copyright (c) 2015 Stefano Azzolini

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/lastguest/dynamicstring/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

