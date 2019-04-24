<?php

namespace Tests\Provider;

use Kreyu\PlaceholderImage\Provider\FillMurrayProvider;
use PHPUnit\Framework\TestCase;

class FillMurrayProviderTest extends TestCase
{
    public function testGeneratingUrl()
    {
        $provider = new FillMurrayProvider;

        $url = $provider->generate(500, 250, [
            'grayscale' => true,
        ]);

        $this->assertEquals('https://fillmurray.com/g/500/250', $url);
    }

    public function testGeneratingUrlWithoutSsl()
    {
        $provider = new FillMurrayProvider;

        $url = $provider->generate(500, 250, [
            'grayscale' => true,
        ], false);

        $this->assertEquals('http://fillmurray.com/g/500/250', $url);
    }
}
