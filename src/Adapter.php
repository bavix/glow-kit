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
     * @param array $data
     * @return Image
     */
    public function apply(Image $image, array $data): Image
    {
        $backup = $this->beforeHandle(clone $image, $data);
        return $this->afterHandle(
            $this->handle($backup, $data),
            $data
        );
    }

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    protected function beforeHandle(Image $image, array $data): Image
    {
        if (!\function_exists('exif_thumbnail')) {
            return clone $image;
        }

        return (clone $image)->orientate();
    }

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    protected function afterHandle(Image $image, array $data): Image
    {
        return $image;
    }

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    abstract protected function handle(Image $image, array $data): Image;

}
