<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Notifications\InquiryReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class InquiryTest extends TestCase
{
    use RefreshDatabase;
    public function test_valid_submission_stores_inquiry_and_redirects_with_success(): void
    {
        $payload = [
            'name' => 'RS Bhayangkara',
            'company' => 'PT Sehat Sentosa',
            'phone' => '08123456789',
            'email' => 'info@rs.com',
            'message' => 'Mohon penawaran alat kesehatan K3 untuk tambang.',
        ];

        $response = $this->post(route('contact.store'), $payload);

        $response->assertRedirect(route('contact'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('inquiries', [
            'name' => 'RS Bhayangkara',
            'email' => 'info@rs.com',
            'message' => 'Mohon penawaran alat kesehatan K3 untuk tambang.',
        ]);
        // New inquiries are unread by default.
        $this->assertDatabaseHas('inquiries', ['name' => 'RS Bhayangkara', 'is_read' => false]);
    }

    public function test_valid_submission_notifies_admin(): void
    {
        Notification::fake();

        $this->post(route('contact.store'), [
            'name' => 'Budi',
            'phone' => '08123',
            'message' => 'Halo, saya butuh kursi roda.',
        ]);

        Notification::assertSentTo(new AnonymousNotifiable, InquiryReceived::class);
    }

    public function test_invalid_submission_is_rejected_and_not_stored(): void
    {
        $before = Inquiry::count();

        $response = $this->post(route('contact.store'), [
            'name' => '',
            'phone' => '',
            'message' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'phone', 'message']);
        $this->assertSame($before, Inquiry::count());
    }
}
