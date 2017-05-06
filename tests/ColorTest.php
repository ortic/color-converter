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
            array('white', '#ffffff', 'toHex'),
            array('white', 'rgba(255, 255, 255, 1)', 'toRgba'),
            array('hsl(0, 100%, 50%)', '#ff0000', 'toHex'),
            array('hsl(255, 100%, 50%)', '#4000ff', 'toHex'),
            array('hsl(100, 100%, 50%)', '#55ff00', 'toHex'),
            array('hsl(50, 40%, 30%)', '#6b612e', 'toHex'),
            array('hsl(10, 40%, 30%)', '#6b382e', 'toHex'),
            array('hsl(120, 10%, 20%)', '#2e382e', 'toHex'),
            array('hsl(180, 20%, 80%)', '#c2d6d6', 'toHex'),
            array('hsl(300, 20%, 80%)', '#d6c2d6', 'toHex'),
            array('hsl(360, 20%, 100%)', '#ffffff', 'toHex'),
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
