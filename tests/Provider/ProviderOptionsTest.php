<?php

namespace Tests\Provider;

use Kreyu\PlaceholderImage\Provider\AbstractProvider;
use Kreyu\PlaceholderImage\Provider\ProviderInterface;
use Kreyu\PlaceholderImage\Provider\ProviderOptions;
use PHPUnit\Framework\TestCase;

class ProviderOptionsTest extends TestCase
{
    public function testGettingCategory()
    {
        $provider = $this->createProvider([
            'categories' => [
                'architecture',
            ],
        ]);

        $options = new ProviderOptions($provider, [
            'category' => 'architecture',
        ]);

        $this->assertEquals('architecture', $options->getCategory());
    }

    public function testGettingInvalidCategory()
    {
        $provider = $this->createProvider([
            'categories' => [
                'architecture',
            ],
        ]);

        $options = new ProviderOptions($provider, [
            'category' => 'cats',
        ]);

        $this->assertEquals(null, $options->getCategory());
    }

    public function testGettingCategoryWithoutTheProviderSupport()
    {
        $provider = $this->createProvider();

        $options = new ProviderOptions($provider, [
            'category' => 'cats',
        ]);

        $this->assertEquals(null, $options->getCategory());
    }
    public function testGettingCategories()
    {
        $provider = $this->createProvider([
            'categories' => [
                'architecture',
                'dogs',
            ],
        ]);

        $options = new ProviderOptions($provider, [
            'categories' => [
                'architecture',
                'dogs',
            ],
        ]);

        $this->assertEquals(['architecture', 'dogs'], $options->getCategories());
    }

    public function testGettingInvalidCategories()
    {
        $provider = $this->createProvider([
            'categories' => [
                'architecture',
                'cats',
            ],
        ]);

        $options = new ProviderOptions($provider, [
            'categories' => [
                'architecture',
                'dogs',
            ],
        ]);

        $this->assertEquals([], $options->getCategories());
    }

    public function testGettingCategoriesWithoutTheProviderSupport()
    {
        $provider = $this->createProvider();

        $options = new ProviderOptions($provider, [
            'categories' => [
                'architecture',
            ],
        ]);

        $this->assertEquals([], $options->getCategories());
    }

    public function testGettingExtension()
    {
        $provider = $this->createProvider([
            'extensions' => [
                'png',
                'jpg',
            ],
        ]);

        $options = new ProviderOptions($provider, [
            'extension' => 'png',
        ]);

        $this->assertEquals('png', $options->getExtension());
    }

    public function testGettingExtensionWithoutTheProviderSupport()
    {
        $provider = $this->createProvider();

        $options = new ProviderOptions($provider, [
            'extension' => 'png',
        ]);

        $this->assertEquals(null, $options->getExtension());
    }

    public function testGettingBackground()
    {
        $provider = $this->createProvider([
            'backgroundColoring' => true,
        ]);

        $options = new ProviderOptions($provider, [
            'background' => 'FAFAFA',
        ]);

        $this->assertEquals('FAFAFA', $options->getBackgroundColor());
    }

    public function testGettingBackgroundWithoutTheProviderSupport()
    {
        $provider = $this->createProvider();

        $options = new ProviderOptions($provider, [
            'background' => 'FAFAFA',
        ]);

        $this->assertEquals(null, $options->getBackgroundColor());
    }

    public function testGettingForeground()
    {
        $provider = $this->createProvider([
            'foregroundColoring' => true,
        ]);

        $options = new ProviderOptions($provider, [
            'foreground' => 'FAFAFA',
        ]);

        $this->assertEquals('FAFAFA', $options->getForegroundColor());
    }

    public function testGettingForegroundWithoutTheProviderSupport()
    {
        $provider = $this->createProvider();

        $options = new ProviderOptions($provider, [
            'foreground' => 'FAFAFA',
        ]);

        $this->assertEquals(null, $options->getForegroundColor());
    }

    public function testGettingGrayscale()
    {
        $provider = $this->createProvider([
            'grayscale' => true,
        ]);

        $options = new ProviderOptions($provider, [
            'grayscale' => true,
        ]);

        $this->assertEquals(true, $options->getGrayscale());
    }

    public function testGettingGrayscaleWithoutTheProviderSupport()
    {
        $provider = $this->createProvider();

        $options = new ProviderOptions($provider, [
            'grayscale' => false,
        ]);

        $this->assertEquals(null, $options->getGrayscale());
    }

    public function testGettingCustomText()
    {
        $provider = $this->createProvider([
            'customText' => true,
        ]);

        $options = new ProviderOptions($provider, [
            'text' => 'Beep boop',
        ]);

        $this->assertEquals('Beep boop', $options->getCustomText());
    }

    public function testGettingCustomTextWithoutTheProviderSupport()
    {
        $provider = $this->createProvider();

        $options = new ProviderOptions($provider, [
            'text' => 'Beep boop',
        ]);

        $this->assertEquals(null, $options->getCustomText());
    }

    /**
     * Retrieve an instance of provider with given options.
     *
     * @param  array $options
     * @return ProviderInterface
     */
    protected function createProvider($options = [])
    {
        return new class($options) extends AbstractProvider {
            public function __construct($options) {
                if (array_key_exists('categories', $options)) {
                    $this->categories = $options['categories'];
                }

                if (array_key_exists('extensions', $options)) {
                    $this->extensions = $options['extensions'];
                }

                if (array_key_exists('backgroundColoring', $options)) {
                    $this->backgroundColoring = $options['backgroundColoring'];
                }

                if (array_key_exists('foregroundColoring', $options)) {
                    $this->foregroundColoring = $options['foregroundColoring'];
                }

                if (array_key_exists('grayscale', $options)) {
                    $this->grayscale = $options['grayscale'];
                }

                if (array_key_exists('customText', $options)) {
                    $this->customText = $options['customText'];
                }
            }

            protected function buildUrl($width, $height, ProviderOptions $options, bool $ssl) {
                return '';
            }
        };
    }
}
