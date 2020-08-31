<?php

namespace Bavix\Glow\Test;

use Bavix\Glow\Adapters\ScaleDown;

class GDScaleDownTest extends TestCase
{

    /**
     * @var string
     */
    protected $driver = 'gd';

    /**
     * @dataProvider sizes
     * @param string $path
     * @param array $data
     * @param array $units
     * @return void
     */
    public function testSizeResultImage(string $path, array $data, array $units): void
    {
        $adapter = new ScaleDown($this->imageManager);
        $image = $this->imageManager->make($path);
        $processed = $adapter->apply($image, $data);

        self::assertEquals($units['width'], $processed->width());
        self::assertEquals($units['height'], $processed->height());
        $processed->destroy();
        $image->destroy();
    }

    /**
     * @return array[]
     */
    public function sizes(): array
    {
        return [
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => 500,
                    'height' => null,
                    'strict' => false,
                ],
                ['width' => 500, 'height' => 296],
            ],
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => null,
                    'height' => 500,
                    'strict' => false,
                ],
                ['width' => 780, 'height' => 462],
            ],
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => 500,
                    'height' => 500,
                    'strict' => false,
                ],
                ['width' => 500, 'height' => 296],
            ],
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => 800,
                    'height' => 800,
                    'strict' => false,
                ],
                ['width' => 780, 'height' => 462],
            ],
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => 780,
                    'height' => 462,
                    'strict' => false,
                ],
                ['width' => 780, 'height' => 462],
            ],
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => 500,
                    'height' => 500,
                    'strict' => true,
                ],
                ['width' => 500, 'height' => 500],
            ],
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => 800,
                    'height' => 800,
                    'strict' => true,
                ],
                ['width' => 800, 'height' => 800],
            ],
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => 780,
                    'height' => 462,
                    'strict' => true,
                ],
                ['width' => 780, 'height' => 462],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 500,
                    'height' => null,
                    'strict' => false,
                ],
                ['width' => 500, 'height' => 625],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => null,
                    'height' => 500,
                    'strict' => false,
                ],
                ['width' => 400, 'height' => 500],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 500,
                    'height' => 500,
                    'strict' => false,
                ],
                ['width' => 400, 'height' => 500],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 800,
                    'height' => 800,
                    'strict' => false,
                ],
                ['width' => 640, 'height' => 800],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 780,
                    'height' => 462,
                    'strict' => false,
                ],
                ['width' => 370, 'height' => 462],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 500,
                    'height' => 500,
                    'strict' => true,
                ],
                ['width' => 500, 'height' => 500],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 800,
                    'height' => 800,
                    'strict' => true,
                ],
                ['width' => 800, 'height' => 800],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 780,
                    'height' => 462,
                    'strict' => true,
                ],
                ['width' => 780, 'height' => 462],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 500,
                    'height' => null,
                    'strict' => false,
                ],
                ['width' => 500, 'height' => 500],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => null,
                    'height' => 500,
                    'strict' => false,
                ],
                ['width' => 500, 'height' => 500],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 500,
                    'height' => 500,
                    'strict' => false,
                ],
                ['width' => 500, 'height' => 500],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 800,
                    'height' => 800,
                    'strict' => false,
                ],
                ['width' => 600, 'height' => 600],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 780,
                    'height' => 462,
                    'strict' => false,
                ],
                ['width' => 462, 'height' => 462],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 500,
                    'height' => 500,
                    'strict' => true,
                ],
                ['width' => 500, 'height' => 500],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 800,
                    'height' => 800,
                    'strict' => true,
                ],
                ['width' => 800, 'height' => 800],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 780,
                    'height' => 462,
                    'strict' => true,
                ],
                ['width' => 780, 'height' => 462],
            ],
        ];
    }

}
