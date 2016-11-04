# DynamicString

> Generate random strings from templates.

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

A fun use for DynamicString: a fantasy RPG stories generator.

```php
$generator = new DynamicString();

$name = "(Quick|Fast|Wet|Rusty|Warm|Curved|Old|Terror|Notched|Smelly|Loud|Heavy|Shiny|Sparkling|Fire|Laser|Cold|Fizzle|Power|Bad|Good|Rustle|Dark|Smokey|Super|Fishy|Pointy|Flash|Beauty|Bleeding|Foo|Master|Small|Big|Red|Gray|Hairy|Magic|Broken|Sharp|Grand|Straight)(mind|blower|killer|hand|ey(e|es)|fee(t|ts)|finge(r|rs)|nose|armpi(t|ts)|blaster|rhymes|bar|sword|blade|breath)";

$race = "(lion|human|worm|rat|orc|elf|pixie|walrus|rooster|dog|parrot|rabbit)";
$class = "(rogue|paladin|warrior|cook|cleric|psychopath|fisherman|wolf)";
$player = "$name, the $race $class.";

$sillystory = "(A (sloppy|quick|brave|small|gentle|cruel|fabulous|shiny) $class $race, named $name) (jumped onto|walked to|crawled under|entered|sprinted to|runned into) a( rooftop| bridge|n house| wormhole|n inn| dungeon) (shouting|whispering|saying|barfing|asking for) ((ancient|magic|modern|silly|awkward) (words|names|runes|spells|shouts|rhimes|swears|songs|tacos)).";
```

Now, we can generate a silly story with :

```php
echo $generator->render($sillystory);
```

Some examples :

```
A cruel rogue orc, named Smellyarmpits jumped onto an house barfing magic tacos.
A fabulous paladin pixie, named Graybar jumped onto a rooftop shouting silly runes.
A brave paladin worm, named Pointyblaster runned into an inn saying awkward names.
A brave psychopath rooster, named Wetsword entered a bridge whispering silly words.
A shiny paladin worm, named Darkeyes walked to a bridge asking for awkward names.
A small psychopath rooster, named Bleedingbar crawled under an inn saying magic songs.
A sloppy warrior parrot, named Rustyblower jumped onto an house asking for ancient swears.
```

Or we can generate some fun names for our characters : 

```php
echo $generator->render($player);
```

```
Badblade, the rabbit cleric.
Hairykiller, the elf fisherman.
Bleedingblower, the pixie psychopath.
Notchedrhymes, the pixie paladin.
Fastfingers, the human psychopath.
Hairyfeets, the pixie fisherman.
```

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

