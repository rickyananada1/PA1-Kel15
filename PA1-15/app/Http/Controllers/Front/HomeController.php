<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\HasilTani;
use App\Models\Kategori;
use App\Models\Pupuk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $kategori = Kategori::get();
        $hasiltani = HasilTani::get();
        return view('front.welcome', compact('kategori', 'hasiltani'));
    }

    public function hasiltani(Request $request)
    {
        $kategoriId = $request->input('kategori');
        $hasiltani = HasilTani::query();

        if ($kategoriId) {
            $hasiltani->where('kategori_id', $kategoriId);
        }

        $hasiltani = $hasiltani->latest()->get();
        $kategori = Kategori::all();
        return view('front.HasilTani', compact('kategori', 'hasiltani'));
    }
    public function pupuk()
    {
        $pupuk = Pupuk::paginate(5, ['*'], 'page')->onEachSide(1);
        $kategori = Kategori::all();
        return view('front.pupuk', compact('pupuk', 'kategori'));
    }

    public function aboutus()
    {
        $kategori = Kategori::all();
        return view ('front.aboutus', compact('kategori'));
    }

    public function contactus()
    {
        $kategori = Kategori::all();
        return view ('front.contactus', compact('kategori'));
    }

}
