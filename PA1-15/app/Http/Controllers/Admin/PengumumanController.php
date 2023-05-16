<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengumuman = Pengumuman::all();
        return view('admin.pengumuman.create', compact('pengumuman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'nama' => 'required',
            'isi' => 'required',
        ];
        $message = [
            'nama.required' => 'Kolom Nama Harus Di Isi',
            'isi.required' => 'Kolom Isi Harus Di Isi'
        ];
        $this->validate($request, $rules, $message);

        $pengumuman = new Pengumuman;

        $pengumuman->nama = $request->nama;
        $pengumuman->isi = $request->isi;

        $pengumuman->save();
        return redirect('/admin/pengumuman')->with('success_message', 'Pengumuman Berhasil Dibuat');
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
        $pengumuman = Pengumuman::find($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama' => 'required',
            'isi' => 'required',
        ];
        $message = [
            'nama.required' => 'Kolom Nama Harus Di Isi',
            'isi.required' => 'Kolom Isi Harus Di Isi'
        ];
        $this->validate($request, $rules, $message);

        $pengumuman = Pengumuman::find($id);

        $pengumuman->nama = $request['nama'];
        $pengumuman->isi = $request['isi'];

        $pengumuman->update();
        return redirect('/admin/pengumuman')->with('success_message', 'Pengumuman Berhasil Dibuat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();
        return redirect('/admin/pengumuman')->with('success_message', $pengumuman->nama . 'berhasil dihapus');
    }
}
