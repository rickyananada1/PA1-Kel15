<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = ['nama', 'deskripsi'];

    public function hasiltani()
    {
        return $this->hasMany(Hasiltani::class, 'id_kategori', 'id');
    }
}
