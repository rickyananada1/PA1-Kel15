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
Route::get('/hasiltani', [HomeController::class, 'hasiltani']);
Route::get('/pupuk', [HomeController::class, 'pupuk'])->middleware('Guest');
Route::get('/aboutus', [HomeController::class, 'aboutus']);
// Route::get('/contactus', [HomeController::class, 'contactus']);

require __DIR__ . '/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    // Admin Login route
    Route::match (['get', 'post'], 'login', 'AdminController@login');
    Route::middleware(['admin'])->group(function () {
        Route::resource('kategori', 'KategoriController');
        Route::resource('hasiltani', 'HasilTaniController');
        Route::resource('pupuk', 'PupukController');
        //Route pengumuman
        Route::resource('pengumuman', 'PengumumanController');
    });
    Route::group(['middleware' => ['admin']], function () {
        //Route Admin Dashboard
        Route::get('dashboard', 'AdminController@dashboard');
        // Route::get('notify', 'AdminController@notify');
        Route::get('tandai/{id}', 'AdminController@read')->name('tandai');
        Route::get('tandaisudahdibaca/{id}', 'AdminController@markasread')->name('tandaisudahdibaca');
        //Update Admin Password
        Route::match (['get', 'post'], 'update-admin-password', 'AdminController@UpdateAdminPassword');
        //Check Admin Password
        Route::post('check-admin-password', 'AdminController@checkAdminPassword');

        //Update Admin Details
        Route::match (['get', 'post'], 'update-admin-details', 'AdminController@UpdateAdminDetails');
        //view Anggot
        Route::get('anggota/{nama?}', 'AdminController@anggota')->name('anggota');
        //Admin Logout
        Route::get('logout', 'AdminController@logout');
        //admin profile
        Route::get('profile', 'AdminController@profile');
        Route::get('status/{id}', 'AdminController@status')->name('status');
        //Route status pemesanan
        Route::get('daftarpemesanan', 'AdminController@daftarpemesanan')->name('daftarpemesanan');
        Route::get('statuspemesanan/{id}', 'AdminController@statuspemesanan')->name('statuspemesanan');
        //Route Delete Akun
        Route::delete('akunanggota/{id}', 'AdminController@delete')->name('deleteakun');
    });
});

Route::prefix('/petani')->namespace('App\Http\Controllers\Anggota')->group(function () {
    //Petani Login Route
    Route::match (['get', 'post'], 'login', 'AnggotaController@login');
    // //Route Forgot Password
    // Route::match(['get', 'post'], 'lupa-password', 'AnggotaController@forgotpassword');
    Route::middleware(['petani'])->group(function () {
        Route::resource('kategori', 'KategoriController');
        Route::resource('hasiltani', 'HasilTaniController');
    });
    Route::group(['middleware' => ['petani']], function () {
        //Route Petani Dashboard
        Route::get('dashboard', 'AnggotaController@dashboard')->middleware('CheckAprroval');
        Route::get('markasread/{id}', 'AnggotaController@markasread')->name('markasread');
        //Route Pengumuman
        Route::get('pengumuman', 'AnggotaController@pengumuman');
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
    });
    Route::match (['get', 'post'], 'register', 'AnggotaController@register');
});
