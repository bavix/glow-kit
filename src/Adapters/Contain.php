<?php

namespace Bavix\Glow\Adapters;

use Intervention\Image\Image;
use Intervention\Image\Constraint;

class Contain extends ScaleDown
{

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    protected function handle(Image $image, array $data): Image
    {
        return $image->resize($data['width'], $data['height'], static function (Constraint $constraint) {
            $constraint->aspectRatio();
        });
    }

}
