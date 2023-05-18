<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\HasilTani;
use App\Models\Kategori;
use App\Models\Pemesanan;
use App\Notifications\OffersNotification;
use App\Notifications\PemesananPupukNotification;
use Auth;
use File;
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

        $admin = Auth::guard('admin')->user();

        $anggota = Anggota::get();

        foreach ($anggota as $anggotaItem) {
            $saveNotifications = $admin->notifications()
                ->where('data->anggota_id', $anggotaItem->id)
                ->first();

            if (!$saveNotifications) {
                $notification = new OffersNotification($anggotaItem);

                $admin->notify($notification);
            }
        }

        $pemesanan = Pemesanan::get();
        foreach ($pemesanan as $pemesananItem) {
            $saveNotifications = $admin->notifications()
                ->where('data->pemesanan_id', $pemesananItem->id)
                ->first();

            if (!$saveNotifications) {
                // Membuat instance notifikasi dan memberikan data pemesanan
                $notification = new PemesananPupukNotification($pemesananItem);

                $admin->notify($notification);
            }
        }
        return view('admin.HasilTani.index', compact('hasiltani'), compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hasiltani = HasilTani::all();
        $kategori = Kategori::get();

        $admin = Auth::guard('admin')->user();

        $anggota = Anggota::get();

        foreach ($anggota as $anggotaItem) {
            $saveNotifications = $admin->notifications()
                ->where('data->anggota_id', $anggotaItem->id)
                ->first();

            if (!$saveNotifications) {
                $notification = new OffersNotification($anggotaItem);

                $admin->notify($notification);
            }
        }

        $pemesanan = Pemesanan::get();
        foreach ($pemesanan as $pemesananItem) {
            $saveNotifications = $admin->notifications()
                ->where('data->pemesanan_id', $pemesananItem->id)
                ->first();

            if (!$saveNotifications) {
                // Membuat instance notifikasi dan memberikan data pemesanan
                $notification = new PemesananPupukNotification($pemesananItem);

                $admin->notify($notification);
            }
        }
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

        $file = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $file);

        $hasiltani = new HasilTani;

        $hasiltani->nama = $request->nama;
        $hasiltani->image = $file;
        $hasiltani->harga = $request->harga;
        $hasiltani->deskripsi = $request->deskripsi;
        $hasiltani->kategori_id = $request->kategori_id;

        $hasiltani->save();

        return redirect('/admin/hasiltani');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hasiltani = HasilTani::find($id);

        $admin = Auth::guard('admin')->user();

        $anggota = Anggota::get();

        foreach ($anggota as $anggotaItem) {
            $saveNotifications = $admin->notifications()
                ->where('data->anggota_id', $anggotaItem->id)
                ->first();

            if (!$saveNotifications) {
                $notification = new OffersNotification($anggotaItem);

                $admin->notify($notification);
            }
        }

        $pemesanan = Pemesanan::get();
        foreach ($pemesanan as $pemesananItem) {
            $saveNotifications = $admin->notifications()
                ->where('data->pemesanan_id', $pemesananItem->id)
                ->first();

            if (!$saveNotifications) {
                // Membuat instance notifikasi dan memberikan data pemesanan
                $notification = new PemesananPupukNotification($pemesananItem);

                $admin->notify($notification);
            }
        }
        return view('admin.HasilTani.read', compact('hasiltani'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hasiltani = HasilTani::find($id);
        $kategori = Kategori::get();

        $admin = Auth::guard('admin')->user();

        $anggota = Anggota::get();

        foreach ($anggota as $anggotaItem) {
            $saveNotifications = $admin->notifications()
                ->where('data->anggota_id', $anggotaItem->id)
                ->first();

            if (!$saveNotifications) {
                $notification = new OffersNotification($anggotaItem);

                $admin->notify($notification);
            }
        }

        $pemesanan = Pemesanan::get();
        foreach ($pemesanan as $pemesananItem) {
            $saveNotifications = $admin->notifications()
                ->where('data->pemesanan_id', $pemesananItem->id)
                ->first();

            if (!$saveNotifications) {
                // Membuat instance notifikasi dan memberikan data pemesanan
                $notification = new PemesananPupukNotification($pemesananItem);

                $admin->notify($notification);
            }
        }
        return view('admin.HasilTani.edit', compact('hasiltani', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = [
            'nama' => 'required|regex:/^[\pL\s\-]+$/u',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama Harus Di Isi',
            'nama.regex' => 'Nama Harus Berupa Huruf',
            'harga.required' => 'Kolom Harga Harus Di Isi',
            'harga.numeric' => 'Kolom Harga harus berupa Angka',
            'deskripsi.required' => 'Kolom Deskripsi Harus di isi',
            'kategori_id.required' => 'Kolom Kategori Harus Di pilih',
        ];
        $this->validate($request, $validate, $message);
        $hasiltani = HasilTani::find($id);
        if ($request->has('image')) {
            $path = 'image/';
            File::delete($path . $hasiltani->image);
            $file = time() . '.' . $request->image->extension();

            $request->image->move(public_path('image'), $file);

            $hasiltani->image = $file;

            $hasiltani->save();
        }

        $hasiltani->nama = $request['nama'];
        $hasiltani->harga = $request['harga'];
        $hasiltani->deskripsi = $request['deskripsi'];
        $hasiltani->kategori_id = $request['kategori_id'];

        $hasiltani->update();

        return redirect('/admin/hasiltani');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hasiltani = HasilTani::find($id);

        $path = 'image/';
        File::delete($path . $hasiltani->image);

        $hasiltani->delete();
        return redirect('/admin/hasiltani');
    }
}
