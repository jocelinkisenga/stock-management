<?php

declare(strict_types=1);

namespace App\Notifications\Channels;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class WhatsappChannel
{
    public function send($notifiable, Notification $notification): void
    {
        $to = $notifiable->routeNotificationFor('whatsapp');
        if (! $to) {
            return;
        }
        $message = $notification->toWhatsapp($notifiable);
        Log::info('sent successifully', ['to' => $to, 'message' => $message]);
    }
}
