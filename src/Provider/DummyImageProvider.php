<?php

namespace Kreyu\PlaceholderImage\Provider;

class DummyImageProvider extends AbstractProvider
{
    /**
     * The provider's base url without the protocol.
     *
     * @var string
     */
    protected $host = 'dummyimage.com';

    /**
     * The provider's supported image extensions.
     *
     * @var array
     */
    protected $extensions = [
        'gif', 'jpg', 'png',
    ];

    /**
     * Specification whether the supplier supports background coloring.
     *
     * @var bool
     */
    protected $backgroundColoring = true;

    /**
     * Specification whether the supplier supports foreground coloring.
     *
     * @var bool
     */
    protected $foregroundColoring = true;

    /**
     * Specification whether the supplier supports custom text.
     *
     * @var bool
     */
    protected $customText = true;

    /**
     * {@inheritDoc}
     */
    protected function buildUrl($width, $height, ProviderOptions $options, bool $ssl)
    {
        $url = $this->getBaseUrl($ssl) . '/' . $width;

        if ($height) {
            $url .= 'x' . $height;
        }

        if ($extension = $options->getExtension()) {
            $url .= '.' . $extension;
        }

        if ($background = $options->getBackgroundColor()) {
            $url .= '/' . $background;

            if ($foreground = $options->getForegroundColor()) {
                $url .= '/' . $foreground;
            }
        }

        if ($text = $options->getCustomText()) {
            $url .= '&text=' . str_replace(' ', '+', $text);
        }

        return $url;
    }
}
