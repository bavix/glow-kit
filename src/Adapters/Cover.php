<?php

namespace Bavix\Glow\Adapters;

use Bavix\Glow\Adapter;
use Intervention\Image\Constraint;
use Intervention\Image\Image;

class Cover extends Adapter
{

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    protected function handle(Image $image, array $data): Image
    {
        $width = max($data['width'], $data['height']);
        $height = null;
        if ($image->width() > $image->height()) {
            $height = $width;
            $width = null;
        }

        return $image->resize(
            $width,
            $height,
            static function (Constraint $constraint) {
                $constraint->aspectRatio();
            }
        );
    }

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    protected function afterHandle(Image $image, array $data): Image
    {
        return parent::afterHandle($image, $data)->crop(
            $data['width'],
            $data['height'],
            (int)($image->width() / 2 - $data['width'] / 2),
            (int)($image->height() / 2 - $data['height'] / 2),
        );
    }

}
