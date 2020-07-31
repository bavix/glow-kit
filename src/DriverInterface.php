<?php

namespace Bavix\Glow;

use Intervention\Image\Image;
use Intervention\Image\ImageManager;

interface DriverInterface
{
    /**
     * DriverInterface constructor.
     * @param ImageManager $imageManager
     */
    public function __construct(ImageManager $imageManager);

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    public function apply(Image $image, array $data): Image;
}
