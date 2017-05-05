<?php

use Ortic\ColorConverter\Color;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    
    public function providerColorStrings()
    {
        return array(
            array('#ffffff', '#ffffff'),
            array('#FFFFFF', '#ffffff'),
            array('#fff', '#ffffff'),
            array('#fc0', '#ffcc00'),
            array('rgb(255, 255, 255)', '#ffffff'),
            array('rgb (255,255,255)', '#ffffff'),
            array('rgb(255,255,255)', '#ffffff'),
            array('rgb(  255, 255,255  ) ', '#ffffff'),
        );
    }

    /**
     * @dataProvider providerColorStrings
     */
    public function testColorStrings($colorString, $hexColor)
    {
        $output = Color::fromString($colorString)->toHex();
        $this->assertEquals($output, $hexColor);
    }
}
