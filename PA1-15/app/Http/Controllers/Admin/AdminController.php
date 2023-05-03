<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Anggota;
use App\Models\Kategori;
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
        return view('admin.dashboard', compact('JumlahAnggota'), compact('JumlahKategori'));
    }

    public function UpdateAdminPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

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
        // echo $password = Hash::make('daman12345'); die;
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";
            // print_r($data); die;

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

        return redirect()->back()->with('message', $data['nama'] . 'Status has been changed Successfully');
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
}
