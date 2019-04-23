<?php

namespace Kreyu\PlaceholderImage\Provider;

class FillMurrayProvider extends AbstractProvider
{
    /**
     * The provider's base url without the protocol.
     *
     * @var string
     */
    protected $host = 'fillmurray.com';

    /**
     * Specification whether the supplier supports grayscale.
     *
     * @var bool
     */
    protected $grayscale = true;

    /**
     * {@inheritDoc}
     */
    protected function buildUrl($width, $height, ProviderOptions $options)
    {
        $url = $this->host;

        if ($options->getGrayscale()) {
            $url .= '/g';
        }

        if (!$height) {
            $height = $width;
        }

        $url .= '/' . $width . '/' . $height;

        return $url;
    }
}
