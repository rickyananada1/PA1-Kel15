<?php

namespace App\Http\Controllers\Anggota;

use App\Events\AnggotaCreated;
use App\Http\Controllers\Anggota\Redirect;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\HasilTani;
use App\Models\Kategori;
use App\Models\Pemesanan;
use App\Models\Pupuk;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class AnggotaController extends Controller
{
    public function dashboard()
    {
        $JumlahKategori = Kategori::count();
        $JumlahHasilTani = HasilTani::count();
        $user = Auth::guard('petani')->user()->id;
        $JumlahPemesanan = Pemesanan::where('anggota_id', $user)->count();
        return view('petani.dashboard', compact('JumlahKategori', 'JumlahHasilTani', 'JumlahPemesanan'));
    }

    public function UpdatePetaniPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'current_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required',
            ];
            $message = [
                'current_password.required' => 'Current Password Harus Di Isi',
                'new_password.required' => 'Password Baru Harus Di Isi',
                'new_password.min' => 'Password Baru minimal 8 karakter',
                'confirm_password.required' => 'Confirm Password Harus Di Isi',
            ];
            $this->validate($request, $rules, $message);

            if (Hash::check($data['current_password'], Auth::guard('petani')->user()->password)) {
                if ($data['confirm_password'] == $data['new_password']) {
                    Anggota::where('id', Auth::guard('petani')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message', 'Password Berhasil di Update');
                } else {
                    return redirect()->back()->with('error_message', 'New Password dan Confirm Password tidak sesuai');
                }
            } else {
                return redirect()->back()->with('error_message', 'Current Password Salah');
            }
        }
        $petaniDetails = Anggota::where('email', Auth::guard('petani')->user()->email)->first()->toArray();
        return view('petani.setting.update_petani_password')->with(compact('petaniDetails'));
    }

    public function checkPetaniPassword(Request $request)
    {
        $data = $request->all();

        if (Hash::check($data['current_password'], Auth::guard('petani')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function UpdatePetaniDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'Nama' => 'required|regex:/^[\pL\s\-]+$/u',
                'NoTelephone' => 'required|numeric',
                'alamat' => 'required',
                'TempatLahir' => 'required',
                'TanggalLahir' => 'required',
                'JenisKelamin' => 'required',
                'umur' => 'required',
                'Email' => 'required|email|max:255',
            ];

            $messages = [
                'Nama.required' => 'Nama Harus Di Isi',
                'NoTelephone.required' => 'No Telephone Harus Di Isi',
                'NoTelephone.numeric' => 'No Telephone yang Benar Harus Di Isi',
                'alamat.required' => 'Kolom Alamat Harus Di Isi',
                'Nama.regex' => 'Nama yang Benar Harus Di Isi',
                'Email.required' => 'Email Harus Di Isi',
                'Email.email' => 'Email tidak valid',
                'umur.required' => 'Umur Harus Di Isi',
                'TempatLahir.required' => 'Tempat Lahir Harus Di Isi',
                'TanggalLahir.required' => 'Tanggal Lahir Harus Di Isi',
                'JenisKelamin.required' => 'JenisKelamin Harus Di Isi',
            ];

            $this->validate($request, $rules, $messages);

            //upload Foto
            if ($request->hasFile('images')) {
                $image = $request->file('images');
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();

                    $imageName = rand() . '.' . $extension;
                    $imagePath = 'petani/images/photo/' . $imageName;
                    Image::make($image)->save($imagePath);
                }
            } else if (!empty($data['current_petani_image'])) {
                $imageName = $data['current_petani_image'];
            } else {
                $imageName = "";
            }

            Anggota::where('id', Auth::guard('petani')->user()->id)->update(['nama' => $data['Nama'], 'NoTelephone' => $data['NoTelephone'], 'image' => $imageName, 'alamat' => $data['alamat'], 'umur' => $data['umur'], 'TempatLahir' => $data['TempatLahir'], 'TanggalLahir' => $data['TanggalLahir'], 'JenisKelamin' => $data['JenisKelamin'], 'email' => $data['Email']]);
            return redirect()->back()->with('success_message', 'Petani Details Berhasil di Update');
        }
        return view('petani.setting.update_petani_details');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255|exists:anggotas,email',
                'password' => 'required',
            ];
            $message = [
                'email.required' => 'Email Harus Di Isi.',
                'email.email' => 'Email Tidak Sesuai',
                'email.exists' => 'Email Belum Terdaftar',
                'password.required' => 'Password Harus Di Isi.',
            ];
            $this->validate($request, $rules, $message);

            if (Auth::guard('petani')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('/petani/dashboard');
            } else {
                return redirect('/petani/login');
            }
        }
        return view('petani.login');
    }
    public function logout()
    {
        Auth::guard('petani')->logout();
        return redirect('/');
    }

    public function profile()
    {
        return view('petani.profile.profile');
    }
    public function register(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->input();
            $rules = [
                'nama' => 'required|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email|max:255|unique:anggotas,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8',
            ];
            $message = [
                'nama.required' => 'Nama Harus Di Isi',
                'nama.regex' => 'Nama Tidak boleh menggunakan simbol/angka',
                'email.required' => 'Email Harus Di Isi.',
                'email.unique' => 'Email Sudah Terdaftar',
                'email.email' => 'Email Tidak Sesuai',
                'password.required' => 'Password Harus Di Isi.',
                'password.min' => 'Password Minimal 8 karakter.',
                'confirm_password.required' => 'Confirm Password Harus Di Isi',
                'confirm_password.min' => 'Confirm Password minimal 8 karakter',
            ];
            $this->validate($request, $rules, $message);
            if ($data['password'] == $data['confirm_password']) {
                Anggota::insert([
                    'nama' => $request->input('nama'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                ]);
                event(new AnggotaCreated($anggotaItem = $this->create($request->all())));
            } else {
                return redirect()->back()->with('error', 'Password dan Confirm Password tidak sesuai');
            }
            return redirect('petani/login')->with('success_message', 'Anggota Berhasil Didaftarkan');
        }
        return view('petani.register');
    }
    public function pesan(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            $rules = [
                'pupuk_id' => 'required',
                'stok' => 'required',
                'tanggal' => 'required',
            ];
            $messages = [
                'pupuk_id.required' => 'Silahkan Pilih Nama Pupuk',
                'stok.required' => 'Stok Harus Di isi',
                'tanggal.required' => 'Tanggal Pemesanan Harus Di Pilih',
            ];
            $this->validate($request, $rules, $messages);

            $pemesanan = new Pemesanan;
            $pemesanan->anggota_id = Auth::guard('petani')->user()->id;
            $pemesanan->pupuk_id = $request->input('pupuk_id');
            $pemesanan->stok = $request->input('stok');
            $pemesanan->tanggal = $request->input('tanggal');

            $pupuk = Pupuk::find($request->input('pupuk_id'));

            if ($pemesanan->stok > $pupuk->stok) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi.');
            }

            $pemesanan->save();

            if ($pemesanan->status == 1) {
                $pupuk->stok -= $request->input('stok');
                $pupuk->save();
            }

            return redirect()->back()->with('success', 'Pemesanan berhasil.');
        }

        $pupuk = Pupuk::get();
        return view('petani.pemesanan', compact('pupuk'));
    }

    public function daftarpesan()
    {
        $user = Auth::guard('petani')->user()->id;
        $pemesanan = Pemesanan::where('anggota_id', $user)->get();
        return view('petani.datapesan', compact('pemesanan'));
    }
    public function deletepesan($id)
    {
        $pemesanan = Pemesanan::find($id);
        if ($pemesanan->status != 0) {
            return redirect()->back()->with('error', 'tidak dapat dihapus.');
        } else {
            $pemesanan->delete();
            return redirect()->back()->with('success', 'Pemesanan berhasil dihapus.');
        }
    }
    public function delete()
    {
        $anggotaId = Auth::guard('petani')->user()->id;
        Pemesanan::where('anggota_id', $anggotaId)->delete();
        Anggota::find($anggotaId)->delete();

        Auth::guard('petani')->logout();
        return redirect('/petani/login')->with('success_message', 'Akun berhasil dihapus.');
    }

}
