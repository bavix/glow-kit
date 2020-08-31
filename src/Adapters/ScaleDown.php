<?php

namespace Bavix\Glow\Adapters;

use Bavix\Glow\Adapter;
use Intervention\Image\Constraint;
use Intervention\Image\Image;

class ScaleDown extends Adapter
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
            $constraint->upsize();
        });
    }

    /**
     * @param Image $image
     * @param array $data
     * @return Image
     */
    protected function afterHandle(Image $image, array $data): Image
    {
        $image = parent::afterHandle($image, $data);
        if ($data['strict'] ?? false) {
            $canvas = $this->imageManager->canvas(
                $data['width'],
                $data['height'],
                $data['color'] ?? null
            );

            $canvas->insert($image, $data['position'] ?? 'center');
            $image->destroy();

            return $canvas;
        }

        return $image;
    }

}
