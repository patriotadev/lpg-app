<?php

use App\Http\Controllers\GasController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProfileController;
use App\Mail\SendEmail;
use App\Models\Gas;
use App\Models\Keranjang;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {

    $data = [
        'totalGas' => Gas::all()->count(),
        'totalPelanggan' => Pelanggan::all()->count(),
        'totalPenjualan' => Penjualan::all()->count(),
    ];

    return view('_dashboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/lokasi', function () {
    return view('pages.lokasi');
})->middleware(['auth', 'verified'])->name('lokasi');

Route::get('/jenis-gas', function () {
    return view('pages.jenis_gas');
})->middleware(['auth', 'verified'])->name('jenis_gas');

Route::get('/pelanggan', [PelangganController::class, 'index'])->middleware(['auth', 'verified'])->name('pelanggan');
Route::get('/pelanggan/{params}', [PelangganController::class, 'getPelangganByMonth'])->middleware(['auth', 'verified'])->name('pelanggan_month');

Route::get('/jenis_gas', [GasController::class, 'index'])->middleware(['auth', 'verified'])->name('jenis_gas');

Route::get('/jenis_gas/add', function () {
    return view('pages.jenis_gas_add');
})->middleware(['auth', 'verified'])->name('jenis_gas_add');

Route::get('/jenis_gas/edit/{id}', [GasController::class, 'edit'])->middleware(['auth', 'verified'])->name('jenis_gas_edit');
Route::post('/jenis_gas/edit', [GasController::class, 'update'])->middleware(['auth', 'verified'])->name('jenis_gas.edit');
Route::delete('/jenis_gas/destroy/{id}', [GasController::class, 'destroy'])->middleware(['auth', 'verified'])->name('jenis_gas.destroy');

Route::post('/jenis_gas/add', [GasController::class, 'create'])->middleware(['auth', 'verified'])->name('jenis_gas.add');

Route::get('/pelanggan/add', function () {
    return view('pages.pelanggan_add');
})->middleware(['auth', 'verified'])->name('pelanggan_add');

Route::get('/pelanggan/import', function () {
    return view('pages.pelanggan_import');
})->middleware(['auth', 'verified'])->name('pelanggan_import');

Route::post('/pelanggan/import', [PelangganController::class, 'import'])->middleware(['auth', 'verified'])->name('pelanggan.import');

Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->middleware(['auth', 'verified'])->name('pelanggan_edit');

Route::post('/pelanggan/edit/', [PelangganController::class, 'update'])->middleware(['auth', 'verified'])->name('pelanggan.update');

Route::delete('/pelanggan/destroy/{id}', [PelangganController::class, 'destroy'])->middleware(['auth', 'verified'])->name('pelanggan.destroy');
Route::delete('/penjualan/destroy/{id}', [PenjualanController::class, 'destroy'])->middleware(['auth', 'verified'])->name('penjualan.destroy');

Route::get('/penjualan', [PenjualanController::class, 'index'])->middleware(['auth', 'verified'])->name('penjualan');
Route::get('/penjualan/edit/{id}', [PenjualanController::class, 'edit'])->middleware(['auth', 'verified'])->name('penjualan_edit');

Route::get('/penjualan/add', function () {
    $data = [
        'jenis_gas' => Gas::all()
    ];
    return view('pages.penjualan_add', $data);
})->middleware(['auth', 'verified'])->name('penjualan_add');

Route::post('/pelanggan/add', [PelangganController::class, 'create'])->middleware(['auth', 'verified'])->name('pelanggan.add');
Route::post('/penjualan/add', [PenjualanController::class, 'create'])->middleware(['auth', 'verified'])->name('penjualan.add');
Route::post('/penjualan/update-status', [PenjualanController::class, 'updateStatus'])->middleware(['auth', 'verified'])->name('penjualan.update.status');
Route::post('/penjualan/edit', [PenjualanController::class, 'update'])->middleware(['auth', 'verified'])->name('penjualan.update');

Route::get('/laporan', [LaporanController::class, 'index'])->middleware(['auth', 'verified'])->name('laporan');
Route::get('/laporan/bulanan', [LaporanController::class, 'laporanBulanan'])->middleware(['auth', 'verified'])->name('laporan.bulanan');
Route::get('/laporan/bulanan/{params}', [LaporanController::class, 'laporanBulananByMonth'])->middleware(['auth', 'verified'])->name('laporan.bulanan.month');
Route::get('/laporan/penyebaran', [LaporanController::class, 'laporanPenyebaran'])->middleware(['auth', 'verified'])->name('laporan.penyebaran');
Route::get('/laporan/penyebaran/{params}', [LaporanController::class, 'laporanPenyebaranByMonth'])->middleware(['auth', 'verified'])->name('laporan.penyebaran.month');
Route::get('/laporan/penerimaan', [LaporanController::class, 'laporanPenerimaan'])->middleware(['auth', 'verified'])->name('laporan.penerimaan');
Route::get('/laporan/penerimaan/{params}', [LaporanController::class, 'laporanPenerimaanByMonth'])->middleware(['auth', 'verified'])->name('laporan.penerimaan.month');

Route::get('/keranjang', [KeranjangController::class, 'index'])->middleware(['auth', 'verified'])->name('keranjang');
Route::get('/keranjang/add', [KeranjangController::class, 'createView'])->middleware(['auth', 'verified'])->name('keranjang_add');
Route::post('/keranjang/update-status', [KeranjangController::class, 'updateStatus'])->middleware(['auth', 'verified'])->name('keranjang.update.status');
Route::post('/keranjang/add', [KeranjangController::class, 'create'])->middleware(['auth', 'verified'])->name('keranjang.add');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
