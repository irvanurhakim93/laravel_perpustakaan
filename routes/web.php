<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TestPDF;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//admin & books routes
Route::get('/perpustakaan/admin',[AdminController::class,'dashboard'])->name('admindashboard');
Route::get('/perpustakaan/admin/buku/daftarbuku',[AdminController::class,'daftarbuku'])->name('admin.daftarbuku');
Route::get('/perpustakaan/admin/buku/tambahbuku', [AdminController::class,'tambahbuku'])->name('admin.tambahbuku');
Route::get('/perpustakaan/admin/buku/kategoribuku', [AdminController::class,'kategoribuku'])->name('admin.kategoribuku');
Route::post('/perpustakaan/admin/buku/uploadbukuproses', [AdminController::class,'uploadBuku'])->name('admin.uploadbuku');
Route::get('/perpustakaan/admin/buku/ubahbuku/{id}', [AdminController::class,'editbuku'])->name('admin.editbuku');
Route::post('/perpustakaan/admin/buku/updatebuku/{id}', [AdminController::class,'updatebuku'])->name('admin.updatebuku');
Route::delete('/perpustakaan/admin/buku/hapusbuku/{id}', [AdminController::class,'hapusbuku'])->name('admin.hapusbuku');
Route::get('/perpustakaan/admin/buku/downloadbukupdf/{id}', [AdminController::class,'generatePDF'])->name('admin.downloadbuku');
Route::get('/perpustakaan/admin/buku/downloadbukuexcel/{id}', [AdminController::class,'generateExcel'])->name('admin.downloadbukuexcel');

//penulis & penerbit route
Route::get('/perpustakaan/admin/buku/penulis', [AdminController::class,'daftarPenulis'])->name('penulis.index');
Route::get('/perpustakaan/admin/buku/penerbit', [AdminController::class,'daftarPenerbit'])->name('penerbit.index');

//member routes
Route::get('/perpustakaan/admin/anggota',[AnggotaController::class,'index'])->name('admin.listanggota');
Route::get('/perpustakaan/admin/anggota/tambahanggota', [AnggotaController::class,'tambahanggota'])->name('admin.tambahanggota');
Route::post('/perpustakaan/admin/anggota/uploadanggota', [AnggotaController::class,'uploadanggota'])->name('admin.uploadanggota');
Route::get('/perpustakaan/admin/anggota/editanggota/{id}', [AnggotaController::class,'editanggota'])->name('admin.editanggota');
Route::post('/perpustakaan/admin/anggota/updateanggota/{id}', [AnggotaController::class,'updateanggota'])->name('admin.updateanggota');
Route::delete('/perpustakaan/admin/anggota/hapusanggota{id}', [AnggotaController::class,'hapusanggota'])->name('admin.hapusanggota');

//peminjam routes
Route::get('/perpustakaan/admin/anggota/peminjam', [PeminjamController::class,'index'])->name('peminjam.index');
Route::get('/perpustakaan/admin/anggota/peminjam/editpeminjam/{id}', [PeminjamController::class,'editPeminjam'])->name('peminjam.edit');
Route::post('/perpustakaan/admin/anggota/peminjam/updatepeminjam/{id}', [PeminjamController::class,'updatePeminjam'])->name('peminjam.update');
Route::delete('/perpustakaan/admin/anggota/peminjam/hapuspeminjam/{id}', [PeminjamController::class,'hapusPeminjam'])->name('peminjam.delete');
//petugas routes
Route::get('/perpustakaan/admin/petugas', [PetugasController::class,'index'])->name('admin.listpetugas');

Route::get('/test-pdf', [TestPDF::class,'generatePDF']);