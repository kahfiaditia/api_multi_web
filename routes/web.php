<?php

use App\Exports\InvoiceExport;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepanIsiController;
use App\Http\Controllers\DesaBannerController;
use App\Http\Controllers\DesaBlog;
use App\Http\Controllers\DesaGalleryController;
use App\Http\Controllers\DesaKegiatanController;
use App\Http\Controllers\DesaPerangkatController;
use App\Http\Controllers\DesaProfilController;
use App\Http\Controllers\DesaSambutanController;
use App\Http\Controllers\DesaSosialController;
use App\Http\Controllers\DesaUtamaController;
use App\Http\Controllers\DesaVisiController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PeminjamanController;
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

 //website desa utama
Route::get('/', [DesaUtamaController::class, 'utama'])->name('utama');
Route::get('/tentang', [DesaUtamaController::class, 'tentang'])->name('tentang');
Route::get('/artikel', [DesaUtamaController::class, 'artikel'])->name('artikel');
Route::get('/kegiatan', [DesaUtamaController::class, 'kegiatan'])->name('kegiatan');
Route::get('/kegiatan/{id}', [DesaUtamaController::class, 'show'])->name('kegiatan.show');
Route::get('/jadwal', [DesaUtamaController::class, 'jadwal'])->name('jadwal');
Route::get('/kontak', [DesaUtamaController::class, 'kontak'])->name('kontak');
Route::get('/jadwal', [DepanIsiController::class, 'jadwal'])->name('jadwal');


Route::get('/pengaduan', [LoginController::class, 'pengaduan'])->name('pengaduan');
Route::get('/login', [LoginController::class, 'index'])->name('login');
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
        Route::post('/get_rak', [PenyimpananController::class, 'data_rak'])->name('pilih.rak');
        Route::post('/get_buku', [PenyimpananController::class, 'data_buku'])->name('pilih.buku');
        Route::resource('/peminjaman', PeminjamanController::class);
        Route::post('/pinjam_buku', [PeminjamanController::class, 'scanBarcode1'])->name('pinjambuku.scanBarcode1');
        Route::get('/get-siswa', [PeminjamanController::class, 'getSiswa'])->name('get.siswa');
        Route::get('/get-guru', [PeminjamanController::class, 'getGuru'])->name('get.guru');
        Route::post('/dropdown', [PeminjamanController::class, 'buku_ambil'])->name('buku.buku_ambil');
        Route::get('/check-barcode/{barcode}', [PeminjamanController::class, 'checkBarcode']);
        


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



       

        //website desa admin
        Route::resource('/profil_desa', DesaProfilController::class);
        Route::resource('/desa_banner', DesaBannerController::class);
        Route::resource('/desa_blog', DesaBlog::class);
        Route::resource('/desa_perangkat', DesaPerangkatController::class);
        Route::resource('/desa_sambutan', DesaSambutanController::class);
        Route::resource('/desa_visi', DesaVisiController::class);
        Route::resource('/desa_sosial', DesaSosialController::class);
        Route::resource('/desa_galery', DesaGalleryController::class);
        Route::resource('/desa_kegiatan', DesaKegiatanController::class);
    }
);