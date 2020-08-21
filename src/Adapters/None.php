<?php

namespace Bavix\Glow\Adapters;

use Bavix\Glow\Adapter;
use Intervention\Image\Image;

class None extends Adapter
{

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    public function apply(Image $image, array $data): Image
    {
        $width = $data['width'] ?? null;
        $height = $data['height'] ?? null;
        $widthFit = $image->width() >= $image->height() ? $width : null;
        $heightFit = $image->width() <= $image->height() ? $height : null;

        if ($widthFit === null) {
            // vertical image
            $image->rotate(90)
                ->fit($heightFit, $widthFit)
                ->rotate(-90);
        } else {
            // horizontal image
            $image->fit($widthFit, $heightFit);
        }

        $color = $data['color'] ?? null;
        $canvas = $this->imageManager->canvas($width, $height, $color);

        $image->resizeCanvas(
            $width,
            $height,
            'center',
            false,
            $color
        );

        $canvas->fill(
            $image,
            ($canvas->width() - $image->width()) / 2,
            ($canvas->height() - $image->height()) / 2,
        );

        return $canvas;
    }

}
