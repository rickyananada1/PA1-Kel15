<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = ['anggota_id', 'pupuk_id', 'stok', 'tanggal', 'status'];

    public function pupuk()
    {
        return $this->belongsTo(Pupuk::class, 'pupuk_id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}
