<?php

namespace Bavix\Glow\Test;

use Bavix\Glow\Adapters\Cover;

class GDCoverTest extends TestCase
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
        $adapter = new Cover($this->imageManager);
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
                    'height' => 500,
                ],
                ['width' => 500, 'height' => 500],
            ],
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => 800,
                    'height' => 800,
                ],
                ['width' => 800, 'height' => 800],
            ],
            [
                __DIR__ . '/images/width.jpg',
                [
                    'width' => 780,
                    'height' => 462,
                ],
                ['width' => 780, 'height' => 462],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 500,
                    'height' => 500,
                ],
                ['width' => 500, 'height' => 500],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 800,
                    'height' => 800,
                ],
                ['width' => 800, 'height' => 800],
            ],
            [
                __DIR__ . '/images/height.jpg',
                [
                    'width' => 780,
                    'height' => 462,
                ],
                ['width' => 780, 'height' => 462],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 500,
                    'height' => 500,
                ],
                ['width' => 500, 'height' => 500],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 800,
                    'height' => 800,
                ],
                ['width' => 800, 'height' => 800],
            ],
            [
                __DIR__ . '/images/square.jpg',
                [
                    'width' => 780,
                    'height' => 462,
                ],
                ['width' => 780, 'height' => 462],
            ],
        ];
    }

}
