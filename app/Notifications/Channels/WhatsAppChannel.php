<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

/**
 * Delivers a notification over WhatsApp via an HTTP gateway (Fonnte-style).
 * Enabled only when services.wa_gateway.token is configured; otherwise no-op.
 */
class WhatsAppChannel
{
    public function send($notifiable, Notification $notification): void
    {
        if (! method_exists($notification, 'toWhatsApp')) {
            return;
        }

        $notification->toWhatsApp($notifiable);
    }
}
