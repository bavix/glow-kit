<?php

namespace Bavix\Glow\Test;

use Intervention\Image\ImageManager;

/**
 * Class TestCase
 * @package Bavix\Glow\Test
 * @see https://medium.com/@js_tut/rip-css-backgrounds-or-fitting-html-elements-with-css-property-object-fit-16ee28eb5ab0
 * @see https://developer.mozilla.org/ru/docs/Web/CSS/object-fit
 * @see https://codepen.io/chrisnager/pen/XJgJqN/
 * @see https://on.notist.cloud/slides/deck910/large-43.jpg
 * @see https://i0.wp.com/webformyself.com/wp-content/uploads/2020/33/2.png?w=620&ssl=1
 */
class TestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * @var string
     */
    protected $driver;

    /**
     * @var ImageManager
     */
    protected $imageManager;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->imageManager = new ImageManager(['driver' => $this->driver]);
    }

}
