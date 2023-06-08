<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Pupuk;
use Illuminate\Http\Request;

class PupukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pupuk = Pupuk::all();
        return view('admin.Pupuk.index', compact('pupuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Pupuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = [
            'nama' => 'required',
            'jenis' => 'required',
            'stok' => 'required|numeric',
        ];
        $message = [
            'nama.required' => 'Nama Harus Di Isi',
            'jenis.required' => 'Nama Harus Di Isi',
            'stok.required' => 'Stok Harus Di Isi',
        ];
        $this->validate($request, $validasi, $message);

        $pupuk = new Pupuk;

        $pupuk->nama = $request->nama;
        $pupuk->jenis = $request->jenis;
        $pupuk->stok = $request->stok;

        $pupuk->save();
        return redirect('/admin/pupuk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pupuk = Pupuk::find($id);
        return view('admin.Pupuk.read', compact('pupuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pupuk = Pupuk::find($id);
        return view('admin.Pupuk.edit', compact('pupuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi = [
            'nama' => 'required',
            'jenis' => 'required',
            'stok' => 'required|numeric',
        ];
        $message = [
            'nama.required' => 'Nama Harus Di Isi',
            'nama.regex' => 'Nama Harus Berupa Huruf',
            'jenis.required' => 'Nama Harus Di Isi',
            'stok.required' => 'Stok Harus Di Isi',
        ];
        $this->validate($request, $validasi, $message);

        $pupuk = Pupuk::find($id);

        $pupuk->nama = $request['nama'];
        $pupuk->jenis = $request['jenis'];
        $pupuk->stok = $request['stok'];

        $pupuk->update();

        return redirect('/admin/pupuk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pupuk = Pupuk::find($id);
        $pupuk->delete();
        return redirect('/admin/pupuk');
    }
}
