<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\HasilTani;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $kategori = Kategori::select('nama', 'deskripsi')->get();
        $hasiltani = HasilTani::select('nama', 'image', 'harga', 'deskripsi')->get();
        $anggota = Anggota::get();
        return view('front.welcome', compact('kategori', 'hasiltani', 'anggota'));
    }

    public function hasiltani(Request $request)
    {
        $kategori = Kategori::select('nama', 'deskripsi')->get();
        $query = HasilTani::select('nama', 'image', 'harga', 'deskripsi');

        if ($request->has('kategori')) {
            $kategoriId = $request->input('kategori');
            $query->where('kategori_id', $kategoriId);
            $kategori = Kategori::find($kategoriId);
        }

        $hasiltani = $query->get();
        $anggota = Anggota::get();

        return view('front.HasilTani', compact('kategori', 'hasiltani', 'anggota'));
    }

    public function search($id)
    {
        $kategori = Kategori::find($id);
        if (!$kategori) {
            abort(404); // Menampilkan halaman 404 jika kategori tidak ditemukan
        }
        $hasiltani = HasilTani::where('kategori_id', $id)->latest()->get();
        $anggota = Anggota::get();
        return view('front.HasilTani', compact('kategori', 'hasiltani', 'anggota'));
    }

}
