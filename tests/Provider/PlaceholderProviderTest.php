<?php

namespace Tests\Provider;

use Kreyu\PlaceholderImage\Provider\PlaceholderProvider;
use PHPUnit\Framework\TestCase;

class PlaceholderProviderTest extends TestCase
{
    public function testGenerate()
    {
        $provider = new PlaceholderProvider;

        $url = $provider->generate(500, 250, [
            'extension' => 'png',
            'background' => 'FF0000',
            'foreground' => '0000FF',
            'text' => 'Beep boop',
        ]);

        $this->assertEquals('via.placeholder.com/500x250.png/FF0000/0000FF/?text=Beep+boop', $url);
    }
}
