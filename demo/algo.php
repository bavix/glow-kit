<?php

use Bavix\Glow\Adapters\Contain;
use Bavix\Glow\Adapters\Fit;
use Bavix\Glow\Adapters\ScaleDown;
use Bavix\Glow\Adapters\Cover;
use Bavix\Glow\DriverInterface;
use Intervention\Image\ImageManager;

include_once dirname(__DIR__) . '/vendor/autoload.php';

$drivers = ['gd']; // , 'imagick'];
$classes = [
    'contain' => Contain::class,
    'scale' => ScaleDown::class,
    'fit' => Fit::class,
    'cover' => Cover::class,
];

$paths = [
    dirname(__DIR__) . '/tests/images/square.jpg',
    dirname(__DIR__) . '/tests/images/width.jpg',
    dirname(__DIR__) . '/tests/images/height.jpg',
];

$variables = [
    ['width' => 100, 'height' => 500],
    ['width' => 500, 'height' => 100],
    ['width' => 500, 'height' => 500],
    ['width' => 700, 'height' => 700],
    ['width' => 800, 'height' => 600],
    ['width' => 600, 'height' => 800],
    ['width' => 400, 'height' => 300],
    ['width' => 300, 'height' => 400],
    ['width' => 1300, 'height' => 1300],
    ['width' => 100, 'height' => 1300],
    ['width' => 1300, 'height' => 100],
    ['width' => 900, 'height' => null],
    ['width' => null, 'height' => 900],
];

foreach ($drivers as $driver) {
    $imageManager = new ImageManager(['driver' => $driver]);
    foreach ($classes as $name => $class) {
        /**
         * @var DriverInterface $adapter
         */
        $adapter = new $class($imageManager);
        foreach ($paths as $path) {
            $image = $imageManager->make($path);
            foreach ($variables as $variable) {
                if ($class === Cover::class || $class === Fit::class) {
                    if (empty($variable['width']) || empty($variable['height'])) {
                        continue;
                    }
                }

                $result = $adapter->apply($image, $variable);
                $pathName = \sprintf('%s:%s_%dx%d_%s', $driver, $name, (int)$variable['width'], (int)$variable['height'], basename($path));
                $result->save(__DIR__ . '/outputs/' . $pathName);
                $result->destroy();
            }

            $image->destroy();
        }
    }
}
