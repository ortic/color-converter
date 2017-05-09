# color-converter

[![Build Status](https://api.travis-ci.org/ortic/color-converter.svg?branch=master)](https://travis-ci.org/ortic/color-converter)
[![Code Rating](https://img.shields.io/scrutinizer/g/ortic/color-converter.svg?style=flat)](https://scrutinizer-ci.com/g/ortic/color-converter/)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/ortic/color-converter.svg?style=flat)](https://scrutinizer-ci.com/g/ortic/color-converter/)

Helps you to convert between the various ways to define a color in CSS.

## Examples

Assuming you've got a string resembling a color, just call the `fromString` method to get a color object back.

```php
$color = Color::fromString('#ff0000');
```

The hex representation is not the only support schema:

```php
$color = Color::fromString('red');
$color = Color::fromString('rgb(255, 0, 0)');
$color = Color::fromString('hsl(0, 100%, 50%)');
```

Once you have a color object you can get a HEX representation like this:

```php
echo $color->toHex();
```