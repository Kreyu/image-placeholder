<?php

namespace Tests\Provider;

use Kreyu\PlaceholderImage\Provider\DummyImageProvider;
use PHPUnit\Framework\TestCase;

class DummyImageProviderTest extends TestCase
{
    public function testGeneratingUrl()
    {
        $provider = new DummyImageProvider;

        $url = $provider->generate(500, 250, [
            'extension' => 'png',
            'background' => 'FF0000',
            'foreground' => '0000FF',
            'text' => 'Beep boop',
        ]);

        $this->assertEquals('https://dummyimage.com/500x250.png/FF0000/0000FF&text=Beep+boop', $url);
    }

    public function testGeneratingUrlWithoutSsl()
    {
        $provider = new DummyImageProvider;

        $url = $provider->generate(500, 250, [
            'extension' => 'png',
            'background' => 'FF0000',
            'foreground' => '0000FF',
            'text' => 'Beep boop',
        ], false);

        $this->assertEquals('http://dummyimage.com/500x250.png/FF0000/0000FF&text=Beep+boop', $url);
    }
}
