<?php

namespace App\Listeners;

use App\Models\Pengumuman;
use App\Notifications\PengumumanNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNotificationToAnggota
{
    /**
     * Create the event listener.
     */
    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        $Anggota = Pengumuman::whereHas('nama', function($query){
            $query->where('id', 1);
        })->get();

        Notification::send($Anggota, new PengumumanNotification($event->value));
    }
}
