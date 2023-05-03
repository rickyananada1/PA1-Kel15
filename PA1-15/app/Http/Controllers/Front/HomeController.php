<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $kategori = Kategori::select('nama', 'deskripsi')->get();
        return view ('welcome', compact ('kategori'));
    }
}
