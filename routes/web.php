<?php

use App\Exports\InvoiceExport;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepanIsiController;
use App\Http\Controllers\DesaBannerController;
use App\Http\Controllers\DesaBlog;
use App\Http\Controllers\DesaGalleryController;
use App\Http\Controllers\DesaKegiatanController;
use App\Http\Controllers\DesaPengaduan;
use App\Http\Controllers\DesaPerangkatController;
use App\Http\Controllers\WebProfilController;
use App\Http\Controllers\DesaSambutanController;
use App\Http\Controllers\DesaSosialController;
use App\Http\Controllers\DesaUtamaController;
use App\Http\Controllers\DesaVisiController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\SuratPemController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('upcube.central');
});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::group(
    [
        'prefix'     => 'login',
    ],

    function () {
        Route::post('/proses', [LoginController::class, 'authenticate'])->name('login.proses');
    }
);

Route::group(
    [
        'middleware' => 'auth'
    ],
    function () {
        // dashboard

        //website admin
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/profil_web', WebProfilController::class);
        Route::resource('/banner_Web', BannerController::class);
        Route::resource('/blog_web', BlogController::class);
        Route::resource('/team_web', TeamController::class);
        Route::resource('/sambutan_web', SambutanController::class);
        Route::resource('/visi_misi_web', VisiController::class);
        Route::resource('/sosial_web', SosialController::class);
    }
);