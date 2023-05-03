<?php

namespace App\Http\Controllers;

use App\Models\HasilTani;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HasilTaniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hasiltani = HasilTani::all();
        $kategori = Kategori::get();
        return view ('admin.HasilTani.index', compact('hasiltani'), compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hasiltani = HasilTani::all();
        $kategori = Kategori::get();
        return view('admin.HasilTani.create', compact('kategori'), compact('hasiltani'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            'nama' => 'required|regex:/^[\pL\s\-]+$/u',
            'harga' => 'required|numeric',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama Harus Di Isi',
            'nama.regex' => 'Nama Harus Berupa Huruf',
            'harga.required' => 'Kolom Harga Harus Di Isi',
            'harga.numeric' => 'Kolom Harga harus berupa Angka',
            'image.required' => 'Kolom Image Harus Di Isi',
            'deskripsi.required' => 'Kolom Deskripsi Harus di isi',
            'kategori_id.required' => 'Kolom Kategori Harus Di pilih',
        ];
        $this->validate($request, $validate, $message);

        $file = time(). '.' . $request->image->extension();
        $request->image->move(public_path('image'), $file);

        $hasiltani = new HasilTani;

        $hasiltani->nama = $request->nama;
        $hasiltani->image = $file;
        $hasiltani->harga = $request->harga;
        $hasiltani->deskripsi = $request->deskripsi;
        $hasiltani->kategori_id = $request->kategori_id;

        $hasiltani->save();

        return redirect('/hasiltani');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
