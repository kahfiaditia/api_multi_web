<?php

use App\Exports\InvoiceExport;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DhasatraController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\WebProfilController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\KebijakanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\ProdukLegalController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\SuratPemController;
use App\Http\Controllers\SyaratController;
use App\Http\Controllers\TaglineController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('upcube.central');
// });

Route::get('/', [LoginController::class, 'index']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
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
        Route::resource('/banner_web', BannerController::class);
        Route::resource('/blog_web', BlogController::class);
        Route::resource('/team_web', TeamController::class);
        Route::resource('/sambutan_web', SambutanController::class);
        Route::resource('/visi_misi_web', VisiController::class);
        Route::resource('/sosial_web', SosialController::class);
        Route::resource('/galery_web', GaleryController::class);
        Route::resource('/produk_web', produkController::class);
        Route::resource('/client_web', ClientController::class);
        Route::resource('/promo_web', PromoController::class);
        Route::resource('/syarat_web', SyaratController::class);
        Route::resource('/kebijakan_web', KebijakanController::class);
        Route::resource('/faq_web', FaqController::class);
        Route::resource('/tagline_web', TaglineController::class);

        Route::resource('/produk_legal', ProdukLegalController::class);
        Route::resource('/layanan_legal', LayananController::class);
    }
);