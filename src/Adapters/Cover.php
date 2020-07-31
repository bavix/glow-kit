<?php

namespace Bavix\Glow\Adapters;

use Bavix\Glow\Adapter;
use Intervention\Image\Image;

class Cover extends Adapter
{

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    public function apply(Image $image, array $data): Image
    {
        $sizes = $this->received($image, $data);
        return $this->handler($image, $sizes);
    }

}
