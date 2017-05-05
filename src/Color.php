<?php
namespace Ortic\ColorConverter;

use Ortic\ColorConverter\Colors\Rgb;
use Ortic\ColorConverter\Colors\Hex;

class Color 
{

    /** @var int */
    protected $red;
    
    /** @var int */
    protected $green;
    
    /** @var int */
    protected $blue;

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    public function setRed(int $value)
    {
        $this->red = $value;
        return $this;
    }

    public function setGreen(int $value)
    {
        $this->green = $value;
        return $this;
    }

    public function setBlue(int $value)
    {
        $this->blue = $value;
        return $this;
    }

    public static function fromString($colorString)
    {
        $colorString = trim($colorString);
        $classes = [Rgb::class, Hex::class];

        foreach ($classes as $class) {
            try {
                return $class::fromString($colorString);
            }
            catch (\Exception $ex) {
                // skip this, we try to find a working method and raise an exception is nothing works
            }
        }

        throw new \Exception('Unsupported color string ' . $colorString);
    }

    protected function rgbValueToHex(int $value)
    {
        return str_pad(dechex($value), 2, '0', STR_PAD_LEFT);
    }

    public function toHex()
    {
        return '#' .
            $this->rgbValueToHex($this->red) .
            $this->rgbValueToHex($this->green) .
            $this->rgbValueToHex($this->blue);
    }
}