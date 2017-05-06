<?php
namespace Ortic\ColorConverter;

use Ortic\ColorConverter\Colors\Hsl;
use Ortic\ColorConverter\Colors\Named;
use Ortic\ColorConverter\Colors\Rgb;
use Ortic\ColorConverter\Colors\Hex;
use Ortic\ColorConverter\Colors\Rgba;

class Color 
{

    /** @var int */
    protected $red;
    
    /** @var int */
    protected $green;
    
    /** @var int */
    protected $blue;

    /** @var float */
    protected $alpha = 1.0;

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

    public function getAlpha(): float
    {
        return $this->alpha;
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

    public function setAlpha(float $value)
    {
        $this->alpha = $value;
        return $this;
    }

    public static function fromString($colorString)
    {
        $colorString = trim($colorString);
        $classes = [
            Rgb::class,
            Hex::class,
            Rgba::class,
            Named::class,
            Hsl::class,
        ];

        foreach ($classes as $class) {
            try {
                return $class::fromString($colorString);
            }
            catch (\Exception $ex) {
                // skip this, we try to find a working method and raise an exception if nothing works
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

    public function toRgb()
    {
        return "rgb({$this->red}, {$this->green}, {$this->blue})";
    }

    public function toRgba()
    {
        return "rgba({$this->red}, {$this->green}, {$this->blue}, $this->alpha)";
    }
}