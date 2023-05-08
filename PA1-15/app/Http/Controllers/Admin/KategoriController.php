<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = [
            'nama' => 'required|regex:/^[\pL\s\-]+$/u',
            'deskripsi' => 'required',
        ];

        $message = [
            'nama.required' => 'Kolom Nama Harus Di isi',
            'nama.regex' => 'Isi Kolom Nama Harus Berupa Huruf/String',
            'deskripsi.required' => 'Kolom Deskripsi Harus Di isi',
        ];
        $this->validate($request, $validate, $message);
        $kategori = new Kategori;

        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;

        $kategori->save();
        return redirect('/admin/kategori')->with('success_message', 'Kategori' . $kategori->nama . 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.read', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = [
            'nama' => 'required|regex:/^[\pL\s\-]+$/u',
            'deskripsi' => 'required',
        ];

        $message = [
            'nama.required' => 'Kolom Nama Harus Di isi',
            'nama.regex' => 'Isi Kolom Nama Harus Berupa Huruf/String',
            'deskripsi.required' => 'Kolom Deskripsi Harus Di isi',
        ];
        $this->validate($request, $validate, $message);

        $kategori = Kategori::find($id);
        $kategori->nama = $request['nama'];
        $kategori->deskripsi = $request['deskripsi'];

        $kategori->update();
        return redirect('/admin/kategori')->with('success_message', 'Kategori' . $kategori->nama . 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/admin/kategori')->with('success_message', 'Kategori' . $kategori->nama . 'berhasil dihapus');
    }
}
