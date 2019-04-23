<?php

namespace Tests;

use Kreyu\PlaceholderImage\Exception\InvalidProviderException;
use Kreyu\PlaceholderImage\PlaceholderImage;
use Kreyu\PlaceholderImage\Provider\DummyImageProvider;
use Kreyu\PlaceholderImage\Provider\FillMurrayProvider;
use Kreyu\PlaceholderImage\Provider\PlaceholderProvider;
use Kreyu\PlaceholderImage\Provider\PlaceImgProvider;
use PHPUnit\Framework\TestCase;

class PlaceholderImageTest extends TestCase
{
    public function testGettingDummyImageProvider()
    {
        $this->assertInstanceOf(
            DummyImageProvider::class,
            PlaceholderImage::with('dummy_image')
        );
    }

    public function testGettingFillMurrayProvider()
    {
        $this->assertInstanceOf(
            FillMurrayProvider::class,
            PlaceholderImage::with('fill_murray')
        );
    }

    public function testGettingPlaceholderProvider()
    {
        $this->assertInstanceOf(
            PlaceholderProvider::class,
            PlaceholderImage::with('placeholder')
        );
    }

    public function testGettingPlaceImgProvider()
    {
        $this->assertInstanceOf(
            PlaceImgProvider::class,
            PlaceholderImage::with('place_img')
        );
    }

    public function testGettingInvalidProvider()
    {
        $this->expectException(InvalidProviderException::class);
        PlaceholderImage::with('invalid_provider');
    }
}
