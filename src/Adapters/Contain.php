<?php

namespace Bavix\Glow\Adapters;

use Bavix\Glow\Adapter;
use Intervention\Image\Image;

class Contain extends Adapter
{

    /**
     * @param array $data
     *
     * @param Image $image
     * @return Image
     */
    public function apply(Image $image, array $data): Image
    {
        $sizes = $this->received($image, $data, false);

        return $this->handler(
            $image,
            $sizes,
            $data['color'] ?? null
        );
    }

}
