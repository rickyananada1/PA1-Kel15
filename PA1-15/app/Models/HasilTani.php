<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTani extends Model
{
    use HasFactory;
    protected $table = 'hasiltani';

    protected $fillable = ['nama', 'image' ,'harga', 'deskripsi', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id');
    }
}
