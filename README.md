![Glow Kit](https://user-images.githubusercontent.com/5111255/47511169-50ef2c80-d882-11e8-8718-1ecabddb8a7d.png)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bavix/glow-kit/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bavix/glow-kit/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/bavix/glow-kit/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bavix/glow-kit/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bavix/glow-kit/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bavix/glow-kit/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/bavix/glow-kit/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Financial Contributors on Open Collective](https://opencollective.com/glow-kit/all/badge.svg?label=financial+contributors)](https://opencollective.com/glow-kit) [![Mutation testing badge](https://badge.stryker-mutator.io/github.com/bavix/glow-kit/master)](https://packagist.org/packages/bavix/glow-kit)

[![Package Rank](https://phppackages.org/p/bavix/glow-kit/badge/rank.svg)](https://packagist.org/packages/bavix/glow-kit)
[![Latest Stable Version](https://poser.pugx.org/bavix/glow-kit/v/stable)](https://packagist.org/packages/bavix/glow-kit)
[![Latest Unstable Version](https://poser.pugx.org/bavix/glow-kit/v/unstable)](https://packagist.org/packages/bavix/glow-kit)
[![License](https://poser.pugx.org/bavix/glow-kit/license)](https://packagist.org/packages/bavix/glow-kit)
[![composer.lock](https://poser.pugx.org/bavix/glow-kit/composerlock)](https://packagist.org/packages/bavix/glow-kit)

glow-kit - A set for working with an image.


* **Vendor**: bavix
* **Package**: glow-kit
* **Version**: [![Latest Stable Version](https://poser.pugx.org/bavix/laravel-wallet/v/stable)](https://packagist.org/packages/bavix/glow-kit)
* **PHP Version**: 7.3+ 
* **[Composer](https://getcomposer.org/):** `composer require bavix/glow-kit`

### Get started

The library implements simple algorithms for working with images.
- fit
- none
- contain
- cover

#### Fit Image

```php
$fitAdapter = new \Bavix\Glow\Adapters\Fit(\Intervention\Image\ImageManagerStatic::getManager());
$image = \Intervention\Image\ImageManagerStatic::make(__DIR__ . '/image.jpg');
$result = $fitAdapter->apply($image, [
    'width' => '300',
    'height' => '300',
]);

$result->save(__DIR__ . '/output.jpg');
```

#### Contain Image

```php
$fitAdapter = new \Bavix\Glow\Adapters\Contain(\Intervention\Image\ImageManagerStatic::getManager());
$image = \Intervention\Image\ImageManagerStatic::make(__DIR__ . '/image.jpg');
$result = $fitAdapter->apply($image, [
    'width' => '300',
    'height' => '300',
]);

$result->save(__DIR__ . '/output.jpg');
```

---
Supported by

[![Supported by JetBrains](https://cdn.rawgit.com/bavix/development-through/46475b4b/jetbrains.svg)](https://www.jetbrains.com/)
