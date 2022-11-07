<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AngsuranPinjamanController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardAnggotaController;
use App\Http\Controllers\DashboardKetuaController;
use App\Http\Controllers\LaporanArusKasController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\LaporanLabaRugiController;
use App\Http\Controllers\LaporanNeracaController;
use App\Http\Controllers\LaporanPinjamanController;
use App\Http\Controllers\LaporanShuController;
use App\Http\Controllers\LaporanSimpananController;
use App\Http\Controllers\MemorialController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProdukSimpananController;
use App\Http\Controllers\RekeningSimpananController;
use App\Http\Controllers\SimpananAnggotaController;
use App\Http\Controllers\UserController;

Route::middleware('verified.ketua')->group(function () {
    Route::get('/dashboardketua', [DashboardKetuaController::class, 'index'])->name('dashboardketua');
});

Route::get('/dashboardanggota', [DashboardAnggotaController::class, 'index'])->name('dashboardanggota')->middleware('verified.anggota');

Route::get('/', [AuthenticationController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [AuthenticationController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout')->middleware('auth');
Route::middleware('verified.admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dataanggota', [AnggotaController::class, 'index'])->name('index.dataanggota');
    Route::get('/dataanggota/create', [AnggotaController::class, 'create'])->name('create.dataanggota');
    Route::post('/dataanggota', [AnggotaController::class, 'store'])->name('store.dataanggota');
    Route::get('/dataanggota/{dataanggota}/edit', [AnggotaController::class, 'edit'])->name('edit.dataanggota');
    Route::patch('/dataanggota/{dataanggota}/update', [AnggotaController::class, 'update'])->name('update.dataanggota');
    Route::get('/dataanggota/{dataanggota}/show', [AnggotaController::class, 'show'])->name('show.dataanggota');
    Route::delete('/dataanggota/{dataanggota}', [AnggotaController::class, 'destroy'])->name('destroy.dataanggota');
    Route::resource('/datapegawai', PegawaiController::class, [
        'names' => [
            'index'     => 'index',
            'create'    => 'create',
            'edit'      => 'edit',
            'show'      => 'show',
            'destroy'   => 'destroy',
        ]
    ]);
    Route::resource('/datauser', UserController::class, [
        'names' => [
            'index'     => 'index.user',
            'edit'      => 'edit.user',
            'update'    => 'update.user',
            'show'      => 'show.user',
            'destroy'   => 'destroy.user',
        ]
    ]);
    Route::resource('/datapinjaman', PinjamanController::class, [
        'names' => [
            'index'     => 'index.pinjaman',
            'create'    => 'create.pinjaman',
            'update'    => 'update.pinjaman',
            'show'      => 'show.pinjaman',
            'destroy'   => 'destroy.pinjaman',
        ]
    ]);
    Route::name('datarekeningpinjaman.')->prefix('/datarekeningpinjaman/{datarekeningpinjaman}')->group(function () {
        Route::resource('/pinjamananggota', AngsuranPinjamanController::class);
    });
    Route::resource('/datarekeningsimpanan', RekeningSimpananController::class, [
        'names' => [
            'index'     => 'index.rekeningSimpanan',
            'show'      => 'show.rekeningSimpanan',
            'edit'      => 'edit.rekeningSimpanan',
            'destroy'   => 'destroy.rekeningSimpanan',
        ]
    ]);
    Route::name('datarekeningsimpanan.')->prefix('datarekeningsimpanan/{datarekeningsimpanan}')->group(function () {
        Route::resource('/simpanananggota', SimpananAnggotaController::class);
    });
    Route::resource('/dataproduksimpanan', ProdukSimpananController::class, [
        'names' => [
            'index'     => 'index.produksimpanan',
            'create'    => 'create.produksimpanan',
            'edit'      => 'edit.produksimpanan',
            'show'      => 'show.produksimpanan',
            'destroy'   => 'destroy.produksimpanan',
        ]
    ]);
    Route::name('pembukuan.')->group(function () {
        Route::resource('/akun', AkunController::class);
        Route::resource('/datajurnalkas', MemorialController::class)->except('show');
        Route::post('datajurnalkas/printpdf', [MemorialController::class, 'printPdf'])->name('datamemorial.printpdf');
    });
});

Route::name('laporan.')->prefix('laporan')->middleware('accesstolaporan')->group(function () {
    Route::get('/simpanan', [LaporanSimpananController::class, 'index'])->name('simpanan.index');
    Route::get('/simpanan/pdf', [LaporanSimpananController::class, 'printPdf'])->name('simpanan.pdf');
    Route::get('/pinjaman', [LaporanPinjamanController::class, 'index'])->name('pinjaman.index');
    Route::get('/pinjaman/pdf', [LaporanPinjamanController::class, 'printPdf'])->name('pinjaman.pdf');
    Route::get('/shu', [LaporanShuController::class, 'index'])->name('shu.index');
    Route::get('/shu/pdf', [LaporanShuController::class, 'printPdf'])->name('shu.pdf');
    Route::get('/aruskas', [LaporanArusKasController::class, 'index'])->name('aruskas.index');
    Route::get('/aruskas/pdf', [LaporanArusKasController::class, 'printPdf'])->name('aruskas.pdf');
    Route::get('/labarugi', [LaporanLabaRugiController::class, 'index'])->name('labarugi.index');
    Route::get('/labarugi/pdf', [LaporanLabaRugiController::class, 'printPdf'])->name('labarugi.pdf');
    Route::get('/neraca', [LaporanNeracaController::class, 'index'])->name('neraca.index');
    Route::get('/neraca/pdf', [LaporanNeracaController::class, 'printPdf'])->name('neraca.pdf');
    Route::get('/keuangan', [LaporanKeuanganController::class, 'index'])->name('keuangan.index');
    Route::get('/keuangan/pdf', [LaporanKeuanganController::class, 'printPdf'])->name('keuangan.pdf');
});
