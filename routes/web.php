<?php

use App\Exports\InvoiceExport;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenyimpananController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\SuratPemController;
use App\Http\Controllers\UserController;
use App\Models\InvDataModel;
use App\Models\InvItemsModel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/data_user', UserController::class);
        Route::get('/users/qrcode/{id}', [UserController::class, 'generateQRCode'])->name('users.qrcode');

        //perpustakaan
        Route::resource('/member', MemberController::class);
        Route::resource('/rak', RakController::class);
        Route::resource('/buku', BukuController::class);
        Route::resource('/penyimpanan', PenyimpananController::class);

        //invoice
        Route::resource('/data_invoice', InvoiceController::class);

        //Penerima
        Route::get('/data_penerima', [InvoiceController::class, 'index_penerima'])->name('data_penerima.index');
        Route::get('/data_penerima/create', [InvoiceController::class, 'create_penerima'])->name('data_penerima.create');
        Route::post('/get_penerima', [InvoiceController::class, 'get_penerima'])->name('penerima.get_penerima');
        Route::post('/data_penerima/simpan', [InvoiceController::class, 'simpan'])->name('data_penerima.simpan');

        //invoice
        Route::get('/invoice', [InvoiceController::class, 'index_invoice'])->name('invoice');
        Route::get('/invoice/create', [InvoiceController::class, 'buat_invoice'])->name('buat_invoice');
        Route::post('/data_penerima', [InvoiceController::class, 'data_penerima'])->name('penerima.data_penerima');
        Route::post('/invoice/simpan', [InvoiceController::class, 'simpan_invoice'])->name('simpan_invoice');
        Route::get('/invoice/{id}', [InvoiceController::class, 'lihat_invoice'])->name('invoice.lihat');
        Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])->name('invoice.download');

        //surat
        Route::resource('/surat_pemberitahuan', SuratPemController::class);
        Route::get('/surat_pemberitahuan/{id}/pdf', [SuratPemController::class, 'download_surat'])->name('surat.download');
        
    }
);