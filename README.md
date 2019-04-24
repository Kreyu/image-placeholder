# Placeholder Image
 
[![Latest Stable Version](https://poser.pugx.org/kreyu/placeholder-image/version)](https://packagist.org/packages/kreyu/placeholder-image)
[![Build Status](https://travis-ci.org/Kreyu/placeholder-image.svg?branch=master)](https://travis-ci.org/Kreyu/placeholder-image)
 
This package helps with usage of various placeholder image providers.  
Zero dependencies, simple links. 

## Installation

You can install the package via composer:

```bash
composer require kreyu/placeholder-image
```

## Testing

``` bash
composer test
```

## Usage

To generate the url placeholder image: 

```php
PlaceholderImage::with($providerAlias)->generate($width, $height, array $options, $ssl = true); 
```

Example usage:

```php
PlaceholderImage::with('dummy_image')->generate(600, 400, [
    'text' => 'Beep Boop',
    'format' => 'png',
    'background' => 'FF9900',
    'foreground' => 'FFFFFF',
]);
```

Will give us the following url:

```
https://dummyimage.com/600x400/FF9900/FFFFFF.png&text=Beep+boop
```

Fourth argument allows to disable SSL support.

## Supported providers

- `fill_murray` - [fillmurray.com](https://www.fillmurray.com) 
- `dummy_image` - [dummyimage.com](https://dummyimage.com)
- `placeholder` - [placeholder.com](https://placeholder.com)
- `place_img` - [placeimg.com](https://placeimg.com)

Using the invalid provider alias throws the `InvalidProviderException`

```
Fatal error: Uncaught Kreyu\PlaceholderImage\Exception\InvalidProviderException: 
Requested provider invalid-prov does not exist.
```

## License

The MIT License (MIT). Please see [license file](LICENSE.md) for more information.
