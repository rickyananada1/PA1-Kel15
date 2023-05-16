<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Channels\MailChannel;


class OffersNotification extends Notification
{
    use Queueable;
    private $anggota;
    /**
     * Create a new notification instance.
     */
    public function __construct($anggota)
    {
        $this->anggota = $anggota;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'anggota_id' => $this->anggota['id'],
            'nama' => $this->anggota['nama'],
            'email' => $this->anggota['email'],
        ];
    }
}
