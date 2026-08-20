<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Notifications\InquiryReceived;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function show()
    {
        return view('public.contact');
    }

    public function store(Request $request): RedirectResponse
    {
        // Bots that fill the off-screen honeypot get the normal success page and
        // nothing else — no row, no notification, no signal to retry differently.
        if ($request->filled('website')) {
            return $this->sent();
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'company' => ['nullable', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:120'],
            'message' => ['required', 'string', 'max:2000'],
        ], [
            // The form is Indonesian; the default English messages are not.
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama maksimal :max karakter.',
            'company.max' => 'Nama perusahaan maksimal :max karakter.',
            'phone.required' => 'Nomor telepon/WhatsApp wajib diisi.',
            'phone.max' => 'Nomor telepon maksimal :max karakter.',
            'email.email' => 'Format email tidak valid.',
            'message.required' => 'Pesan wajib diisi.',
            'message.max' => 'Pesan maksimal :max karakter.',
        ]);

        $inquiry = Inquiry::create($data);

        // Notify the admin inbox via mail (and WhatsApp when a gateway token is set).
        // The lead is already saved, so a dead SMTP host or gateway must not turn a
        // successful submission into a 500 for the visitor.
        try {
            Notification::route('mail', config('site.admin_email'))
                ->notify(new InquiryReceived($inquiry));
        } catch (\Throwable $e) {
            Log::error('Inquiry notification failed', [
                'inquiry_id' => $inquiry->id,
                'exception' => $e->getMessage(),
            ]);
        }

        return $this->sent();
    }

    private function sent(): RedirectResponse
    {
        return redirect()->route('contact')
            ->with('success', 'Pesan terkirim. Tim kami akan segera menghubungi Anda. Atau langsung hubungi kami via WhatsApp.');
    }
}
