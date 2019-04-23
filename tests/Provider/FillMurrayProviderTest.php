<?php

namespace Tests\Provider;

use Kreyu\PlaceholderImage\Provider\FillMurrayProvider;
use PHPUnit\Framework\TestCase;

class FillMurrayProviderTest extends TestCase
{
    public function testGenerate()
    {
        $provider = new FillMurrayProvider;

        $url = $provider->generate(500, 250, [
            'grayscale' => true,
        ]);

        $this->assertEquals('fillmurray.com/g/500/250', $url);
    }
}
