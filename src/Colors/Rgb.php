<?php
namespace Ortic\ColorConverter\Colors;

use Ortic\ColorConverter\Color;

class Rgb extends Color
{

    public static function fromString($colorString)
    {        
        $matches = [];
        if (!preg_match('/rgb[ ]*\([ ]*(\d{1,3})[ ]*,[ ]*(\d{1,3})[ ]*,[ ]*(\d{1,3})[ ]*\)/i', $colorString, $matches)) {
            throw new \Exception("Invalid RGB string: $colorString");
        }

        $object = new self;
        $object
            ->setRed((int)$matches[1])
            ->setGreen((int)$matches[2])
            ->setBlue((int)$matches[3]);

        return $object;
    }

}