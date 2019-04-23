# Placeholder Image
 
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
PlaceholderImage::with($providerAlias)->generate($width, $height, array $options); 
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
dummyimage.com/600x400/FF9900/FFFFFF.png&text=Beep+boop
```

Using the invalid provider alias throws the `InvalidProviderException`

```
Fatal error: Uncaught Kreyu\PlaceholderImage\Exception\InvalidProviderException: 
Requested provider invalid-prov does not exist.
```

## Supported providers

- `fill_murray` - [fillmurray.com](https://www.fillmurray.com) 
- `dummy_image` - [dummyimage.com](https://dummyimage.com)
- `placeholder` - [placeholder.com](https://placeholder.com)
- `place_img` - [placeimg.com](https://placeimg.com)

## License

The MIT License (MIT). Please see [license file](LICENSE.md) for more information.
