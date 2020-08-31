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
    protected function handle(Image $image, array $data): Image
    {
        return $image->fit(
            $data['width'],
            $data['height'],
            static function (Constraint $constraint) use ($data) {
                if ($data['upsize'] ?? true) {
                    $constraint->upsize();
                }
            },
            $data['position'] ?? 'center',
        );
    }

}
