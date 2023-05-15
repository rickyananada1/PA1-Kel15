<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [HomeController::class, 'welcome']);

require __DIR__ . '/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    // Admin Login route
    Route::match (['get', 'post'], 'login', 'AdminController@login');
    Route::middleware(['admin'])->group(function () {
        Route::resource('kategori', 'KategoriController');
        Route::resource('hasiltani', 'HasilTaniController');
        Route::resource('pupuk', 'PupukController');
    });
    Route::group(['middleware' => ['admin']], function () {
        //Route Admin Dashboard
        Route::get('dashboard', 'AdminController@dashboard');
        //Route Notifikasi
        Route::get('notify', 'AdminController@notify');
        Route::get('markasread/{id}', 'AdminController@markasread')->name('markasread');
        //Update Admin Password
        Route::match (['get', 'post'], 'update-admin-password', 'AdminController@UpdateAdminPassword');
        //Check Admin Password
        Route::post('check-admin-password', 'AdminController@checkAdminPassword');

        //Update Admin Details
        Route::match (['get', 'post'], 'update-admin-details', 'AdminController@UpdateAdminDetails');
        //view Anggota
        Route::get('anggota/{nama?}', 'AdminController@anggota')->name('anggota');
        //Admin Logout
        Route::get('logout', 'AdminController@logout');
        //admin profile
        Route::get('profile', 'AdminController@profile');
        Route::get('status/{id}', 'AdminController@status')->name('status');
        //Route status pemesanan
        Route::get('daftarpemesanan', 'AdminController@daftarpemesanan')->name('daftarpemesanan');
        Route::get('statuspemesanan/{id}', 'AdminController@statuspemesanan')->name('statuspemesanan');
    });
});

Route::prefix('/petani')->namespace('App\Http\Controllers\Anggota')->group(function () {
    //Petani Login Route
    Route::match (['get', 'post'], 'login', 'AnggotaController@login');
    Route::middleware(['petani'])->group(function () {
        Route::resource('kategori', 'KategoriController');
        Route::resource('hasiltani', 'HasilTaniController');
    });
    Route::group(['middleware' => ['petani']], function () {
        //Route Petani Dashboard
        Route::get('dashboard', 'AnggotaController@dashboard')->middleware('CheckAprroval');
        //Update Petani Password
        Route::match (['get', 'post'], 'update-petani-password', 'AnggotaController@UpdatePetaniPassword');
        //check petani password
        Route::post('check-petani-password', 'AnggotaController@checkPetaniPassword');

        //update petani Details
        Route::match (['get', 'post'], 'update-petani-details', 'AnggotaController@UpdatePetaniDetails');

        //Petani Logout
        Route::get('logout', 'AnggotaController@logout');
        //Petani Profile
        Route::get('profile', 'AnggotaController@profile');
        //Pemesanan
        // Route::get('pemesanan', 'AnggotaController@pemesanan');
        Route::match (['get', 'post'], 'pesan', 'AnggotaController@pesan')->name('pemesanan.store');
        //Route Daftar Pesanan
        Route::get('daftarpesan', 'AnggotaController@daftarpesan')->name('listpesanan');
        Route::delete('daftarpesan/{id}', 'AnggotaController@deletepesan')->name('hapuspesanan');
        //Route Delete Akun
        Route::delete('akun', 'AnggotaController@delete')->name('deleteakun');
    });
    Route::match (['get', 'post'], 'register', 'AnggotaController@register');
});
