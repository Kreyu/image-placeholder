<?php

namespace Tests\Provider;

use Kreyu\PlaceholderImage\Provider\PlaceImgProvider;
use PHPUnit\Framework\TestCase;

class PlaceImgProviderTest extends TestCase
{
    public function testGeneratingUrl()
    {
        $provider = new PlaceImgProvider;

        $url = $provider->generate(500, 250, [
            'category' => 'architecture',
        ]);

        $this->assertEquals('https://placeimg.com/500/250/architecture', $url);
    }

    public function testGeneratingUrlWithoutSsl()
    {
        $provider = new PlaceImgProvider;

        $url = $provider->generate(500, 250, [
            'category' => 'architecture',
        ], false);

        $this->assertEquals('http://placeimg.com/500/250/architecture', $url);
    }
}
