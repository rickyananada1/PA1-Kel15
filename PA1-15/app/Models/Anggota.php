<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Anggota extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'petani';
    protected $fillable = [
        'nama',
        'alamat',
        'umur',
        'TempatLahir',
        'TanggalLahir',
        'JenisKelamin',
        'NoTelephone',
        'email',
        'password',
        'image',
        'status',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getLatestAnggotaNotificationTime()
    {
        return $this->notifications()
            ->orderBy('created_at', 'desc')
            ->value('created_at');
    }

}
