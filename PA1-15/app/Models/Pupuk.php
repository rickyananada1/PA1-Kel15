<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pupuk extends Model
{
    use HasFactory;
    protected $table = 'pupuk';
    protected $fillable = ['nama', 'jenis', 'stok'];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id');
    }
}
