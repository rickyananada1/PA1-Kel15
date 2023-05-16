<?php

namespace App\Listeners;
use App\Models\Pemesanan;
use App\Notifications\PemesananPupukNotification;
use Illuminate\Support\Facades\Notification;

class SendNotificationToPemesanan
{
    /**
     * Create the event listener.
     */
    public function handle($event): void
    {
        $Anggota = Pemesanan::whereHas('nama', function($query){
            $query->where('id', 1);
        })->get();

        Notification::send($Anggota, new PemesananPupukNotification($event->pemesanan));
    }
}
