<?php

namespace App\Notifications;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InquiryReceived extends Notification
{
    use Queueable;

    public function __construct(public Inquiry $inquiry) {}

    /**
     * The "mail" channel notifies the configured admin address.
     * The custom "whatsapp" channel (below) is used only when a gateway token is set.
     */
    public function via(object $notifiable): array
    {
        $channels = ['mail'];

        if (config('services.wa_gateway.token')) {
            $channels[] = 'whatsapp';
        }

        return $channels;
    }

    public function toMail(object $notifiable): MailMessage
    {
        $inquiry = $this->inquiry;

        return (new MailMessage)
            ->subject('Inquiry baru: '.$inquiry->name)
            ->greeting('Ada inquiry baru dari website')
            ->line('Nama: '.$inquiry->name)
            ->line($inquiry->company ? 'Perusahaan: '.$inquiry->company : 'Perusahaan: -')
            ->line('Telepon: '.$inquiry->phone)
            ->line($inquiry->email ? 'Email: '.$inquiry->email : 'Email: -')
            ->line('Pesan:')
            ->line($inquiry->message)
            ->action('Lihat di dashboard', url('/admin/inquiries/'.$inquiry->id));
    }

    /**
     * Custom WhatsApp channel: send via a gateway (e.g. Fonnte) when configured.
     * Falls back to no-op in dev (no token set), so it is safe to enable by default.
     */
    public function toWhatsApp(object $notifiable): void
    {
        $token = config('services.wa_gateway.token');
        if (! $token) {
            return;
        }

        $adminPhone = config('site.whatsapp'); // 6283152075506
        $inquiry = $this->inquiry;

        $text = "Ada inquiry baru Alkes Balikpapan:\n"
            .'Nama: '.$inquiry->name."\n"
            .($inquiry->company ? 'Perusahaan: '.$inquiry->company."\n" : '')
            .'Telepon: '.$inquiry->phone."\n"
            .($inquiry->email ? 'Email: '.$inquiry->email."\n" : '')
            .'Pesan: '.$inquiry->message;

        // Gateway HTTP call. Kept minimal; no retry/bail logic needed for a lead ping.
        \Illuminate\Support\Facades\Http::withToken($token)
            ->post('https://api.fonnte.com/send', [
                'target' => $adminPhone,
                'message' => $text,
            ]);
    }
}
