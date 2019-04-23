<?php

namespace Kreyu\PlaceholderImage\Provider;

class ProviderOptions
{
    /**
     * The provider where the support checks are performed on.
     *
     * @var ProviderInterface
     */
    protected $provider;

    /**
     * Options provided by the user.
     *
     * @var array
     */
    protected $options;

    public function __construct(ProviderInterface $provider, array $options = [])
    {
        $this->provider = $provider;
        $this->options = $options;
    }

    /**
     * Retrieve the category from the options, if the provider supports this feature.
     *
     * @return mixed|null
     */
    public function getCategory()
    {
        $category = $this->getOption('category');

        if ($this->provider->supportsCategories() && $this->provider->isCategoryValid($category)) {
            return $category;
        }

        return null;
    }

    /**
     * Retrieve the multiple categories from the options, if the provider supports this feature.
     *
     * @return mixed|null
     */
    public function getCategories()
    {
        $categories = $this->getOption('categories');

        if ($this->provider->supportsCategories() && $this->provider->areCategoriesValid($categories)) {
            return $categories;
        }

        return [];
    }

    /**
     * Retrieve the extension from the options, if the provider supports this feature.
     *
     * @return mixed|null
     */
    public function getExtension()
    {
        $extension = $this->getOption('extension');

        if ($this->provider->supportsExtensions() && $this->provider->isExtensionValid($extension)) {
            return $extension;
        }

        return null;
    }

    /**
     * Retrieve the background color from the options, if the provider supports this feature.
     *
     * @return mixed|null
     */
    public function getBackgroundColor()
    {
        $background = $this->getOption('background');

        if ($this->provider->supportsBackgroundColoring()) {
            return $background;
        }

        return null;
    }

    /**
     * Retrieve the foreground color from the options, if the provider supports this feature.
     *
     * @return mixed|null
     */
    public function getForegroundColor()
    {
        $foreground = $this->getOption('foreground');

        if ($this->provider->supportsForegroundColoring()) {
            return $foreground;
        }

        return null;
    }

    /**
     * Retrieve the grayscale from the options, if the provider supports this feature.
     *
     * @return mixed|null
     */
    public function getGrayscale()
    {
        $grayscale = $this->getOption('grayscale');

        if ($this->provider->supportsGrayscale()) {
            return $grayscale;
        }

        return null;
    }

    /**
     * Retrieve the custom text from the options, if the provider supports this feature.
     *
     * @return mixed|null
     */
    public function getCustomText()
    {
        $text = $this->getOption('text');

        if ($this->provider->supportsCustomText()) {
            return $text;
        }

        return null;
    }

    /**
     * Retrieve an option from options array.
     *
     * @param  string $key
     * @param  mixed  $fallback
     * @return mixed|null
     */
    private function getOption(string $key, $fallback = null)
    {
        if (array_key_exists($key, $this->options)) {
            return $this->options[$key];
        }

        return $fallback;
    }
}
