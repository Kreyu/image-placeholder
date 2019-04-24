<?php

namespace Kreyu\PlaceholderImage\Provider;

abstract class AbstractProvider implements ProviderInterface
{
    /**
     * The provider's base url without the protocol.
     *
     * @var string
     */
    protected $host;

    /**
     * The provider's supported categories.
     *
     * @var array
     */
    protected $categories = [];

    /**
     * The provider's supported image extensions.
     *
     * @var array
     */
    protected $extensions = [];

    /**
     * Specification whether the supplier supports background coloring.
     *
     * @var bool
     */
    protected $backgroundColoring = false;

    /**
     * Specification whether the supplier supports foreground coloring.
     *
     * @var bool
     */
    protected $foregroundColoring = false;

    /**
     * Specification whether the supplier supports grayscale.
     *
     * @var bool
     */
    protected $grayscale = false;

    /**
     * Specification whether the supplier supports custom text.
     *
     * @var bool
     */
    protected $customText = false;

    /**
     * {@inheritDoc}
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * {@inheritDoc}
     */
    public function getSupportedCategories()
    {
        return $this->categories;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsCategories()
    {
        return 0 < count($this->categories);
    }

    /**
     * {@inheritDoc}
     */
    public function isCategoryValid($category)
    {
        return in_array($category, $this->categories);
    }

    /**
     * {@inheritDoc}
     */
    public function areCategoriesValid(array $categories)
    {
        return !array_diff($categories, $this->categories);
    }

    /**
     * {@inheritDoc}
     */
    public function getSupportedExtensions()
    {
        return $this->categories;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsExtensions()
    {
        return 0 < count($this->extensions);
    }

    /**
     * {@inheritDoc}
     */
    public function isExtensionValid($extension)
    {
        return in_array($extension, $this->extensions);
    }

    /**
     * {@inheritDoc}
     */
    public function supportsForegroundColoring()
    {
        return $this->foregroundColoring;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsBackgroundColoring()
    {
        return $this->backgroundColoring;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsGrayscale()
    {
        return $this->grayscale;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsCustomText()
    {
        return $this->customText;
    }

    /**
     * {@inheritDoc}
     */
    public function generate($width, $height, array $options = [], bool $ssl = true)
    {
        return $this->buildUrl($width, $height, new ProviderOptions($this, $options), $ssl);
    }

    /**
     * Build the url for the provider's placeholder image.
     *
     * @param  int|string $width
     * @param  int|string|null $height
     * @param  ProviderOptions $options
     * @param  bool $ssl
     * @return string
     */
    protected abstract function buildUrl($width, $height, ProviderOptions $options, bool $ssl);

    /**
     * Retrieve a protocol string.
     *
     * @param  bool $ssl
     * @return string
     */
    protected function getProtocol(bool $ssl)
    {
        return $ssl ? 'https' : 'http';
    }

    /**
     * Get a base url, which consists of protocol and host.
     *
     * @param  bool $ssl
     * @return string
     */
    protected function getBaseUrl(bool $ssl)
    {
        return $this->getProtocol($ssl) . '://' . $this->host;
    }
}
