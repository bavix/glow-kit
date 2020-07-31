<?php

namespace Bavix\Glow;

use Intervention\Image\Image;
use Intervention\Image\ImageManager;

abstract class Adapter implements DriverInterface
{

    /**
     * @var ImageManager
     */
    protected $imageManager;

    /**
     * DriverInterface constructor.
     * @param ImageManager $imageManager
     */
    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    /**
     * @param Image $image
     * @param array $config
     * @param bool $minimal
     *
     * @return array
     */
    protected function received(Image $image, array $config, $minimal = true): array
    {
        $width = (int)($config['width'] ?? 0);
        $height = (int)($config['height'] ?? 0);

        $shiftWidth = 0;
        $shiftHeight = 0;

        $_width = $width;
        $_height = $height;

        if ($image->height() < $image->width()) {
            $_height = $image->height() * $width / $image->width();
            $shiftHeight = ($_height - $height) / 2;
        } else {
            $_width = $image->width() * $height / $image->height();
            $shiftWidth = ($_width - $width) / 2;
        }

        if ($minimal ^ $_width > $width) {
            $_height = $_height * $width / $_width;
            $_width = $width;
        }

        if ($minimal ^ $_height > $height) {
            $_width = $_width * $height / $_height;
            $_height = $height;
        }

        return [
            'config' => [
                'width' => $width,
                'height' => $height,
            ],
            'received' => [
                'width' => (int)$_width,
                'height' => (int)$_height,
            ],
            'shifted' => [
                'width' => (int)$shiftWidth,
                'height' => (int)$shiftHeight,
            ]
        ];
    }

    /**
     * @param Image $image
     * @param array $data
     * @param null|string $color
     *
     * @return Image
     */
    protected function handler(Image $image, array $data, ?string $color = null): Image
    {
        $color = $color ?: 'rgba(0, 0, 0, 0)';

        $image->resize(
            $data['received']['width'] ?? null,
            $data['received']['height'] ?? null,
        );

        $width = $data['config']['width'] ?? null;
        $height = $data['config']['height'] ?? null;

        $image->resizeCanvas($width, $height, 'center', false, $color);

        $fill = $this->imageManager->canvas($width, $height, $color);

        if ($image->getDriver() instanceof \Intervention\Image\Gd\Driver) {
            $object = $fill;
            $fill = $image;
            $image = $object;
        }

        return $fill->fill(
            $image,
            $data['shifted']['width'] ?? null,
            $data['shifted']['height'] ?? null,
        );
    }

}
