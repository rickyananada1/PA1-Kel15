<?php

namespace App\Listeners;

use App\Events\AnggotaCreated;
use App\Models\Anggota;
use App\Notifications\OffersNotification;
use Illuminate\Support\Facades\Notification;

class SendNotificationToAdmin
{
    /**
     * Create the event listener.
     */

    /**
     * Handle the event.
     */
    public function handle(AnggotaCreated $event): void
    {
        $admin = Anggota::whereHas('nama', function($query){
            $query->where('id', 1);
        })->get();

        Notification::send($admin, new OffersNotification($event->anggotaItem));
    }
}