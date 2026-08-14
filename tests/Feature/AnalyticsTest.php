<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnalyticsTest extends TestCase
{
    use RefreshDatabase;
    public function test_ga_snippet_is_rendered_when_configured(): void
    {
        config(['analytics.ga_id' => 'G-TEST123456']);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('googletagmanager.com/gtag/js?id=G-TEST123456');
    }

    public function test_meta_pixel_snippet_is_rendered_when_configured(): void
    {
        config(['analytics.meta_pixel_id' => '9988776655']);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('fbevents.js');
        $response->assertSee('9988776655');
    }

    public function test_snippets_are_hidden_when_not_configured(): void
    {
        config(['analytics.ga_id' => null, 'analytics.meta_pixel_id' => null]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertDontSee('googletagmanager.com');
        $response->assertDontSee('fbevents.js');
    }
}
