<?php

namespace Tests\Provider;

use Kreyu\PlaceholderImage\Provider\DummyImageProvider;
use PHPUnit\Framework\TestCase;

class DummyImageProviderTest extends TestCase
{
    public function testGenerate()
    {
        $provider = new DummyImageProvider;

        $url = $provider->generate(500, 250, [
            'extension' => 'png',
            'background' => 'FF0000',
            'foreground' => '0000FF',
            'text' => 'Beep boop',
        ]);

        $this->assertEquals('dummyimage.com/500x250.png/FF0000/0000FF&text=Beep+boop', $url);
    }
}
