<?php

namespace Kreyu\PlaceholderImage\Provider;

class PlaceImgProvider extends AbstractProvider
{
    /**
     * The provider's base url without the protocol.
     *
     * @var string
     */
    protected $host = 'placeimg.com';

    /**
     * The provider's supported categories.
     *
     * @var array
     */
    protected $categories = [
        'animals', 'architecture', 'nature', 'people', 'tech', 'grayscale', 'sepia', 'any'
    ];

    /**
     * {@inheritDoc}
     */
    protected function buildUrl($width, $height, ProviderOptions $options)
    {
        $url = $this->host . '/' . $width;

        if (!$height) {
            $height = $width;
        }

        $url .= '/' . $height;

        if ($category = $options->getCategory()) {
            $url .= '/' . $category;
        }

        return $url;
    }
}
