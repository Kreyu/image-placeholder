<?php

namespace Kreyu\PlaceholderImage\Provider;

interface ProviderInterface
{
    /**
     * Retrieve the provider's host base url.
     *
     * @return string
     */
    public function getHost();

    /**
     * Retrieve an array of the provider's supported categories.
     *
     * @return array
     */
    public function getSupportedCategories();

    /**
     * Determine if the provider supports various categories.
     *
     * @return bool
     */
    public function supportsCategories();

    /**
     * Determine if given category is supported by the provider.
     *
     * @param  mixed $category
     * @return bool
     */
    public function isCategoryValid($category);

    /**
     * Determine if all the given categories are supported by the provider.
     *
     * @param  array $categories
     * @return bool
     */
    public function areCategoriesValid(array $categories);

    /**
     * Retrieve an array of the provider's supported image extensions.
     *
     * @return array
     */
    public function getSupportedExtensions();

    /**
     * Determine if the provider supports various image extensions.
     *
     * @return bool
     */
    public function supportsExtensions();

    /**
     * Determine if given extension is supported by the provider.
     *
     * @param  mixed $extension
     * @return bool
     */
    public function isExtensionValid($extension);

    /**
     * Determine if the provider supports foreground coloring.
     *
     * @return bool
     */
    public function supportsForegroundColoring();

    /**
     * Determine if the provider supports background coloring.
     *
     * @return bool
     */
    public function supportsBackgroundColoring();

    /**
     * Determine if the provider supports grayscale.
     *
     * @return bool
     */
    public function supportsGrayscale();

    /**
     * Determine if the provider supports custom text.
     *
     * @return bool
     */
    public function supportsCustomText();

    /**
     * Generate the url for the provider's placeholder image.
     *
     * @param  int|string $width
     * @param  int|string|null $height
     * @param  array $options
     * @return string
     */
    public function generate($width, $height, array $options = []);
}
