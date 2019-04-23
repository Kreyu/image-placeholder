<?php

namespace Tests\Provider;

use Kreyu\PlaceholderImage\Provider\PlaceImgProvider;
use PHPUnit\Framework\TestCase;

class PlaceImgProviderTest extends TestCase
{
    public function testGenerate()
    {
        $provider = new PlaceImgProvider;

        $url = $provider->generate(500, 250, [
            'category' => 'architecture',
        ]);

        $this->assertEquals('placeimg.com/500/250/architecture', $url);
    }
}
