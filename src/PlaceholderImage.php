<?php

namespace Kreyu\PlaceholderImage;

use Kreyu\PlaceholderImage\Exception\InvalidProviderException;
use Kreyu\PlaceholderImage\Provider\DummyImageProvider;
use Kreyu\PlaceholderImage\Provider\FillMurrayProvider;
use Kreyu\PlaceholderImage\Provider\PlaceholderProvider;
use Kreyu\PlaceholderImage\Provider\PlaceImgProvider;
use Kreyu\PlaceholderImage\Provider\ProviderInterface;

class PlaceholderImage
{
    /**
     * List of available providers and their aliases.
     *
     * @var array
     */
    protected $providers = [
        'dummy_image' => DummyImageProvider::class,
        'fill_murray' => FillMurrayProvider::class,
        'placeholder' => PlaceholderProvider::class,
        'place_img' => PlaceImgProvider::class,
    ];

    /**
     * Retrieve an provider namespace by its alias.
     *
     * @param  string $alias
     * @return string|null
     */
    public function getProvider(string $alias)
    {
        if (array_key_exists($alias, $this->providers)) {
            return $this->providers[$alias];
        }

        return null;
    }

    /**
     * Retrieve an instance of the provider by its alias.
     *
     * @param  string $alias
     * @return ProviderInterface
     * @throws InvalidProviderException
     */
    public static function with(string $alias)
    {
        if ($provider = (new static)->getProvider($alias)) {
            return new $provider;
        }

        throw new InvalidProviderException("Requested provider {$alias} does not exist.");
    }
}
