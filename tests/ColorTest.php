<?php

use Ortic\ColorConverter\Color;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    
    public function providerColorStrings()
    {
        return array(
            array('#ffffff', '#ffffff', 'toHex'),
            array('#FFFFFF', '#ffffff', 'toHex'),
            array('#fff', '#ffffff', 'toHex'),
            array('#fc0', '#ffcc00', 'toHex'),
            array('rgb(255, 255, 255)', '#ffffff', 'toHex'),
            array('rgb (255,255,255)', '#ffffff', 'toHex'),
            array('rgb(255,255,255)', '#ffffff', 'toHex'),
            array('rgb(  255, 255,255  ) ', '#ffffff', 'toHex'),
            array('rgba(255, 255, 255, 1) ', '#ffffff', 'toHex'),
            array('rgba(255, 255, 255, 0) ', '#ffffff', 'toHex'),
            array('rgba(255, 255, 255, 0) ', 'rgba(255, 255, 255, 0)', 'toRgba'),
            array('rgba(255, 255, 255, 0.5) ', 'rgba(255, 255, 255, 0.5)', 'toRgba'),
            array('rgba(255, 255, 255, 1) ', 'rgba(255, 255, 255, 1)', 'toRgba'),
            array('#ffffff', 'rgba(255, 255, 255, 1)', 'toRgba'),
        );
    }

    /**
     * @dataProvider providerColorStrings
     */
    public function testColorStrings($colorString, $hexColor, $method)
    {
        $output = Color::fromString($colorString)->$method();
        $this->assertEquals($output, $hexColor);
    }
}
