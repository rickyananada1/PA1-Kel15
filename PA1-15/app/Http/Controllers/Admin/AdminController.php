<?php

namespace App\Http\Controllers\Admin;

use App\Events\AnggotaCreated;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Anggota;
use App\Models\HasilTani;
use App\Models\Kategori;
use App\Models\Pemesanan;
use App\Models\Pupuk;
use App\Notifications\OffersNotification;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public function dashboard()
    {
        $JumlahAnggota = Anggota::count();
        $JumlahKategori = Kategori::count();
        $JumlahHasilTani = HasilTani::count();
        $JumlahPupuk = Pupuk::count();
        $JumlahPemesanan = Pemesanan::count();
        return view('admin.dashboard', compact('JumlahAnggota', 'JumlahKategori', 'JumlahHasilTani', 'JumlahPupuk', 'JumlahPemesanan'));
    }

    public function UpdateAdminPassword(Request $request)
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

            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                if ($data['confirm_password'] == $data['new_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message', 'Password Kamu berhasil di Update');
                } else {
                    return redirect()->back()->with('error_message', 'New Password dan Confirm Password Kamu tidak sesuai');
                }
            } else {
                return redirect()->back()->with('error_message', 'Current Password Kamu Salah');
            }
        }
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }
    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();

        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }
    public function UpdateAdminDetails(Request $request)
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
                'Nama.regex' => 'Nama yang Benar Harus Di Isi',
                'Email.required' => 'Email Harus Di Isi',
                'Email.email' => 'Email tidak valid',
                'umur.required' => 'Umur Harus Di Isi',
                'TempatLahir.required' => 'Tempat Lahir Harus Di Isi',
                'TanggalLahir.required' => 'Tanggal Lahir Harus Di Isi',
                'JenisKelamin.required' => 'JenisKelamin Harus Di Isi',
            ];

            $this->validate($request, $rules, $messages);

            //upload photo
            if ($request->hasFile('images')) {
                $image = $request->file('images');
                if ($image->isValid()) {
                    $extension = $image->getClientOriginalExtension();

                    $imageName = rand() . '.' . $extension;
                    $imagePath = 'admin/images/photo/' . $imageName;
                    Image::make($image)->save($imagePath);
                }
            } else if (!empty($data['current_admin_image'])) {
                $imageName = $data['current_admin_image'];
            } else {
                $imageName = "";
            }

            Admin::where('id', Auth::guard('admin')->user()->id)->update(['nama' => $data['Nama'], 'NoTelephone' => $data['NoTelephone'], 'image' => $imageName, 'alamat' => $data['alamat'], 'umur' => $data['umur'], 'TempatLahir' => $data['TempatLahir'], 'TanggalLahir' => $data['TanggalLahir'], 'JenisKelamin' => $data['JenisKelamin'], 'email' => $data['Email']]);
            return redirect()->back()->with('success_message', 'Admin Details Berhasil di Update');
        }
        return view('admin.settings.update_admin_details');
    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];
            $customMessages = [
                'email.required' => 'Email is required.',
                'email.email' => 'Email is not valid.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 6 characters.',
            ];
            $this->validate($request, $rules, $customMessages);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('/admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function anggota($nama = null)
    {
        $anggota = Anggota::query();
        if ($nama) {
            $anggota = Anggota::where('nama', $nama);
        } else {
            $anggota = $anggota->get()->toArray();
        }
        return view('admin.view.listanggota')->with(compact('anggota'));
    }

    public function status(Request $request, $id)
    {
        $data = Anggota::find($id);

        if ($data['status'] == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        $data->save();

        return redirect()->back()->with('message', $data['nama'] . 'Status Penggunna Berhasil Diganti');
    }
    public function statuspemesanan(Request $request, $id)
    {
        $data = Pemesanan::find($id);
        $pupuk = $data->pupuk;

        if ($request->has('status')) {
            $status = $request->status;
            if ($status == 1) {
                // Cek apakah stok cukup
                if ($pupuk->stok >= $data->stok) {
                    $data->status = 1; // Disetujui
                    $pupuk->stok -= $data->stok; // Kurangi stok pupuk
                    $pupuk->save();
                } else {
                    return redirect()->back()->with('error', 'Stok tidak mencukupi');
                }
            } elseif ($status == 2) {
                $data->status = 2; // Ditolak
            } else {
                $data->status = 0; // Menunggu
            }
        } else {
            if ($data->status == 1) {
                $data->status = 0;
                $pupuk->stok += $data->stok; // Tambahkan stok pupuk
                $pupuk->save();
            } else {
                $data->status = 1;
                // Cek apakah stok cukup
                if ($pupuk->stok >= $data->stok) {
                    $pupuk->stok -= $data->stok; // Kurangi stok pupuk
                    $pupuk->save();
                } else {
                    return redirect()->back()->with('error', 'Stok tidak mencukupi');
                }
            }
        }

        $data->save();
        return redirect()->back()->with('message', 'Status Pemesanan Berhasil Diubah');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function profile()
    {
        return view('admin.profile.profile');
    }

    public function daftarpemesanan()
    {
        $pemesanan = Pemesanan::get();
        return view('admin.daftarpemesanan', compact('pemesanan'));
    }

    public function notify()
    {
        $admin = Admin::find(1);
        $anggota = Anggota::get();
        foreach ($anggota as $anggotaItem) {
            $admin->notify(new OffersNotification($anggotaItem));
        }
    }
    public function markasread($id)
    {
        if ($id) {
            Auth::guard('admin')->user()->unreadNotifications->where('id', $id)->markAsRead();
        }
        return redirect()->back();
    }

}
