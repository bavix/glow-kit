![Glow Kit](https://user-images.githubusercontent.com/5111255/47511169-50ef2c80-d882-11e8-8718-1ecabddb8a7d.png)

[![Mutation testing badge](https://badge.stryker-mutator.io/github.com/bavix/glow-kit/master)](https://packagist.org/packages/bavix/glow-kit)
[![Package Rank](https://phppackages.org/p/bavix/glow-kit/badge/rank.svg)](https://packagist.org/packages/bavix/glow-kit)
[![Latest Stable Version](https://poser.pugx.org/bavix/glow-kit/v/stable)](https://packagist.org/packages/bavix/glow-kit)
[![Latest Unstable Version](https://poser.pugx.org/bavix/glow-kit/v/unstable)](https://packagist.org/packages/bavix/glow-kit)
[![License](https://poser.pugx.org/bavix/glow-kit/license)](https://packagist.org/packages/bavix/glow-kit)

glow-kit - A set for working with an image.


* **Vendor**: bavix
* **Package**: glow-kit
* **Version**: [![Latest Stable Version](https://poser.pugx.org/bavix/laravel-wallet/v/stable)](https://packagist.org/packages/bavix/glow-kit)
* **PHP Version**: 7.3+ 
* **[Composer](https://getcomposer.org/):** `composer require bavix/glow-kit`

### Get started

The library implements simple algorithms for working with images.
- Scale Down
- Contain
- Cover
- Fit

#### Fit Image

```php
use Intervention\Image\ImageManagerStatic;
use Bavix\Glow\Adapters\Fit;

$adapter = new Fit(ImageManagerStatic::getManager());
$image = ImageManagerStatic::make(__DIR__ . '/image.jpg');
$result = $adapter->apply($image, [
    'width' => '300',
    'height' => '300',
]);

$result->save(__DIR__ . '/output.jpg');
```

#### Contain Image

```php
use Intervention\Image\ImageManagerStatic;
use Bavix\Glow\Adapters\Contain;

$adapter = new Contain(ImageManagerStatic::getManager());
$image = ImageManagerStatic::make(__DIR__ . '/image.jpg');
$result = $adapter->apply($image, [
    'width' => '300',
    'height' => '300',
]);

$result->save(__DIR__ . '/output.jpg');
```

#### Cover Image

```php
use Intervention\Image\ImageManagerStatic;
use Bavix\Glow\Adapters\Cover;

$adapter = new Cover(ImageManagerStatic::getManager());
$image = ImageManagerStatic::make(__DIR__ . '/image.jpg');
$result = $adapter->apply($image, [
    'width' => '300',
    'height' => '300',
]);

$result->save(__DIR__ . '/output.jpg');
```

---
Supported by

[![Supported by JetBrains](https://cdn.rawgit.com/bavix/development-through/46475b4b/jetbrains.svg)](https://www.jetbrains.com/)
