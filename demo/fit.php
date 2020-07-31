<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

use Intervention\Image\ImageManagerStatic;
use Bavix\Glow\Adapters\Fit;

$adapter = new Fit(ImageManagerStatic::getManager());
$image = ImageManagerStatic::make(__DIR__ . '/image.jpg');
$result = $adapter->apply($image, [
    'width' => '300',
    'height' => '300',
]);

$result->save(__DIR__ . '/output.jpg');
