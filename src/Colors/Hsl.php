<?php

namespace Ortic\ColorConverter\Colors;

use Ortic\ColorConverter\Color;

class Hsl extends Color
{

    public static function fromString($colorString)
    {
        $matches = [];
        if (!preg_match('/hsl[ ]*\([ ]*(\d{1,3})[ ]*,[ ]*(\d{1,3})%[ ]*,[ ]*(\d{1,3})%[ ]*\)/i', $colorString, $matches)) {
            throw new \Exception("Invalid HSL string: $colorString");
        }

        $hue = $matches[1] / 360;
        $saturation = $matches[2] / 100;
        $lightness = $matches[3] / 100;

        $red = $lightness;
        $green = $lightness;
        $blue = $lightness;

        $v = ($lightness <= 0.5) ? ($lightness * (1.0 + $saturation)) : ($lightness + $saturation - $lightness * $saturation);
        if ($v > 0) {
            $m = $lightness + $lightness - $v;
            $sv = ($v - $m) / $v;
            $hue *= 6;
            $sextant = floor($hue);
            $fract = $hue - $sextant;
            $vsf = $v * $sv * $fract;
            $mid1 = $m + $vsf;
            $mid2 = $v - $vsf;

            switch ($sextant) {
                case 0:
                    $red = $v;
                    $green = $mid1;
                    $blue = $m;
                    break;
                case 1:
                    $red = $mid2;
                    $green = $v;
                    $blue = $m;
                    break;
                case 2:
                    $red = $m;
                    $green = $v;
                    $blue = $mid1;
                    break;
                case 3:
                    $red = $m;
                    $green = $mid2;
                    $blue = $v;
                    break;
                case 4:
                    $red = $mid1;
                    $green = $m;
                    $blue = $v;
                    break;
                case 5:
                    $red = $v;
                    $green = $m;
                    $blue = $mid2;
                    break;
            }
        }

        $object = new self;
        $object
            ->setRed(round($red * 255))
            ->setGreen(round($green * 255))
            ->setBlue(round($blue * 255));

        return $object;
    }

}