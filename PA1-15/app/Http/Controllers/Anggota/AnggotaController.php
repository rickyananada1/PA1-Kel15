<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Anggota\Redirect;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Notifications\BellNotification;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Intervention\Image\ImageManagerStatic as Image;

class AnggotaController extends Controller
{
    public function dashboard()
    {
        return view('petani.dashboard');
    }

    public function UpdatePetaniPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

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

            if (Auth::guard('petani')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('/petani/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
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
            if ($data['password'] == $data['confirm_password']) {
                Anggota::insert([
                    'nama' => $request->input('nama'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                ]);
            } else {
                return redirect()->back()->with('error', 'Password dan Confirm Password tidak sesuai');
            }
            return redirect('petani/login')->with('success_message', 'Anggota Created Successfully');
        }
        return view('petani.register');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::guard('petani')->user();
        $user->delete();

        // Redirect to home page or any other page after deleting the account
        return redirect('/');
    }

}
