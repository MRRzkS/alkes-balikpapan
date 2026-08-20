<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

/**
 * The contact form is the only public write endpoint, and every submission costs an
 * email plus a paid WhatsApp gateway message. These cover the abuse and failure paths.
 */
class ContactFormProtectionTest extends TestCase
{
    use RefreshDatabase;

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Klinik Sehat',
            'phone' => '08123456789',
            'message' => 'Mohon penawaran alat kesehatan.',
        ], $overrides);
    }

    public function test_honeypot_submission_is_silently_discarded(): void
    {
        Notification::fake();

        $response = $this->post(route('contact.store'), $this->payload([
            'website' => 'http://spam.example',
        ]));

        // The bot sees the ordinary success page, so it has no signal to retry.
        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');

        $this->assertSame(0, Inquiry::count());
        Notification::assertNothingSent();
    }

    public function test_submissions_are_rate_limited(): void
    {
        Notification::fake();

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('contact.store'), $this->payload())->assertRedirect();
        }

        $this->post(route('contact.store'), $this->payload())->assertStatus(429);

        // The five allowed submissions still landed.
        $this->assertSame(5, Inquiry::count());
    }

    public function test_notification_failure_still_keeps_the_lead(): void
    {
        Log::spy();

        // Stand in for an unreachable SMTP host or a down WhatsApp gateway.
        $this->instance(Dispatcher::class, \Mockery::mock(Dispatcher::class, function ($mock) {
            $mock->shouldReceive('send')->andThrow(new \RuntimeException('SMTP unreachable'));
            $mock->shouldReceive('sendNow')->andThrow(new \RuntimeException('SMTP unreachable'));
        }));

        $response = $this->post(route('contact.store'), $this->payload());

        // The visitor must not get a 500 for a message that was already saved.
        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('inquiries', ['name' => 'Klinik Sehat']);

        Log::shouldHaveReceived('error')->once();
    }

    public function test_validation_errors_are_in_indonesian(): void
    {
        $response = $this->post(route('contact.store'), [
            'name' => '',
            'phone' => '',
            'message' => '',
        ]);

        $response->assertSessionHasErrors([
            'name' => 'Nama wajib diisi.',
            'phone' => 'Nomor telepon/WhatsApp wajib diisi.',
            'message' => 'Pesan wajib diisi.',
        ]);
    }
}
