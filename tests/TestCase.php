<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Blade's @vite directive throws when public/build/manifest.json is missing,
        // which is the state of every fresh checkout (public/build is gitignored).
        // The asset build is verified by CI, not by the feature suite.
        $this->withoutVite();
    }
}
