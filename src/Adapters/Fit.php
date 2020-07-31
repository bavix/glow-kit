<?php

namespace Bavix\Glow\Adapters;

use Bavix\Glow\Adapter;
use Intervention\Image\Constraint;
use Intervention\Image\Image;

class Fit extends Adapter
{

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    public function apply(Image $image, array $data): Image
    {
        $pWidth = $data['width'] ?? null;
        $pHeight = $data['height'] ?? null;
        $width = $pWidth >= $pHeight ? $pHeight : null;
        $height = $pWidth < $pHeight ? $pWidth : null;

        return $image->resize($width, $height, static function (Constraint $constraint) {
            $constraint->aspectRatio();
        });
    }

}
