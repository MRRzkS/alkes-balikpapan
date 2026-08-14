<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Notifications\InquiryReceived;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function show()
    {
        return view('public.contact');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'company' => ['nullable', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:120'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $inquiry = Inquiry::create($data);

        // Notify the admin inbox via mail (and WhatsApp when a gateway token is set).
        Notification::route('mail', config('site.admin_email'))
            ->notify(new InquiryReceived($inquiry));

        return redirect()->route('contact')
            ->with('success', 'Pesan terkirim. Tim kami akan segera menghubungi Anda. Atau langsung hubungi kami via WhatsApp.');
    }
}
