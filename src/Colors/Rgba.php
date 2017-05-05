<?php
namespace Ortic\ColorConverter\Colors;

use Ortic\ColorConverter\Color;

class Rgba extends Color
{

    public static function fromString($colorString)
    {
        $matches = [];
        if (!preg_match('/rgba[ ]*\([ ]*(\d{1,3})[ ]*,[ ]*(\d{1,3})[ ]*,[ ]*(\d{1,3})[ ]*,[ ]*([0,1][\.]?[\d]*)[ ]*\)/i', $colorString, $matches)) {
            throw new \Exception("Invalid RGB string: $colorString");
        }

        $object = new self;
        $object
            ->setRed((int)$matches[1])
            ->setGreen((int)$matches[2])
            ->setBlue((int)$matches[3])
            ->setAlpha((float)$matches[4]);

        return $object;
    }

}