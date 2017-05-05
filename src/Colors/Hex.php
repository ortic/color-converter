<?php
namespace Ortic\ColorConverter\Colors;

use Ortic\ColorConverter\Color;

class Hex extends Color
{
    public static function fromString($colorString)
    {        
        if ($colorString[0] !== '#') {
            throw new \Exception("Invalid HEX string: $colorString");
        }

        if (strlen($colorString) === 7) {
            $red = hexdec(substr($colorString, 1, 2));
            $green = hexdec(substr($colorString, 3, 2));
            $blue = hexdec(substr($colorString, 5, 2));
        }
        else {
            $red = hexdec(str_repeat(substr($colorString, 1, 1), 2));
            $green = hexdec(str_repeat(substr($colorString, 2, 1), 2));
            $blue = hexdec(str_repeat(substr($colorString, 3, 1), 2));
        }
        
        $object = new self;
        $object->setRed((int)$red);
        $object->setGreen((int)$green);
        $object->setBlue((int)$blue);

        return $object;
    }
}