<?php

use Ortic\ColorConverter\Color;

@include __DIR__.'/vendor/autoload.php';

$color = Color::fromString('#ff00bb');
print_r($color);