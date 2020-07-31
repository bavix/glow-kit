<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

$fitAdapter = new \Bavix\Glow\Adapters\Fit(\Intervention\Image\ImageManagerStatic::getManager());
$image = \Intervention\Image\ImageManagerStatic::make(__DIR__ . '/image.jpg');
$result = $fitAdapter->apply($image, [
    'width' => '300',
    'height' => '300',
]);

$result->save(__DIR__ . '/output.jpg');
