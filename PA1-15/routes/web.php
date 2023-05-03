<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\HasilTaniController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

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
    Route::match(['get', 'post'], 'login', 'AdminController@login');
    Route::group(['middleware' => ['admin']], function () {
        //Route Admin Dashboard
        Route::get('dashboard', 'AdminController@dashboard');
        //Update Admin Password
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@UpdateAdminPassword');
        //Check Admin Password
        Route::post('check-admin-password', 'AdminController@checkAdminPassword');

        //Update Admin Details
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@UpdateAdminDetails');
        //view Anggota
        Route::get('anggota/{nama?}', 'AdminController@anggota')->name('anggota');
        //Admin Logout
        Route::get('logout', 'AdminController@logout');
        //admin profile
        Route::get('profile', 'AdminController@profile');
        Route::get('status/{id}', 'AdminController@status')->name('status');
    });
});

Route::prefix('/petani')->namespace('App\Http\Controllers\Anggota')->group(function () {
    //Akun Delete
    Route::delete('delete-account', 'AnggotaController@deleteAccount')->name('delete-account');
    //Petani Login Route
    Route::match(['get', 'post'], 'login', 'AnggotaController@login');
    Route::group(['middleware' => ['petani']], function () {
        //Route Petani Dashboard
        Route::get('dashboard', 'AnggotaController@dashboard')->middleware('CheckAprroval');
        //Update Petani Password
        Route::match(['get', 'post'], 'update-petani-password', 'AnggotaController@UpdatePetaniPassword');
        //check petani password
        Route::post('check-petani-password', 'AnggotaController@checkPetaniPassword');

        //update petani Details
        Route::match(['get', 'post'], 'update-petani-details', 'AnggotaController@UpdatePetaniDetails');

        //Petani Logout
        Route::get('logout', 'AnggotaController@logout');
        //Petani Profile
        Route::get('profile', 'AnggotaController@profile');
    });
    Route::match(['get', 'post'], 'register', 'AnggotaController@register');
});

Route::resource('kategori', KategoriController::class);
Route::resource('hasiltani', HasilTaniController::class);
