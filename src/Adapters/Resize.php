<?php

namespace Bavix\Glow\Adapters;

use Bavix\Glow\Adapter;
use Intervention\Image\Image;

class Resize extends Adapter
{

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    public function apply(Image $image, array $data): Image
    {
        return $image->resize(
            $data['width'] ?? null,
            $data['height'] ?? null,
        );
    }

}
