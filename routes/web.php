<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TestPDF;
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


Route::get('/perpustakaan', [LoginController::class,'showFormLogin']);

// manage admin,buku,& peminjam routes
Route::get('/perpustakaan/admin/dashboard',[AdminController::class,'dashboard'])->name('admindashboard');
Route::get('/perpustakaan/admin/buku/daftarbuku',[AdminController::class,'daftarbuku'])->name('admin.daftarbuku');
Route::get('/perpustakaan/admin/buku/tambahbuku', [AdminController::class,'tambahbuku'])->name('admin.tambahbuku');
Route::get('/perpustakaan/admin/buku/kategoribuku', [AdminController::class,'kategoribuku'])->name('admin.kategoribuku');
Route::post('/perpustakaan/admin/buku/uploadbukuproses', [AdminController::class,'uploadBuku'])->name('admin.uploadbuku');
Route::get('/perpustakaan/admin/buku/ubahbuku/{id}', [AdminController::class,'editbuku'])->name('admin.editbuku');
Route::post('/perpustakaan/admin/buku/updatebuku/{id}', [AdminController::class,'updatebuku'])->name('admin.updatebuku');
Route::delete('/perpustakaan/admin/buku/hapusbuku/{id}', [AdminController::class,'hapusbuku'])->name('admin.hapusbuku');
Route::get('/perpustakaan/admin/buku/downloadbukupdf/{id}', [AdminController::class,'generatePDF'])->name('admin.downloadbuku');
Route::get('/perpustakaan/admin/buku/downloadbukuexcel', [AdminController::class,'generateExcel'])->name('admin.downloadbukuexcel');

//manage penulis & penerbit routes
Route::get('/perpustakaan/admin/buku/penulis', [AdminController::class,'daftarPenulis'])->name('penulis.index');
Route::get('/perpustakaan/admin/buku/penerbit', [AdminController::class,'daftarPenerbit'])->name('penerbit.index');

//manage anggota routes
Route::get('/perpustakaan/admin/anggota/peminjam', [PeminjamController::class,'index'])->name('peminjam.index');
Route::get('/perpustakaan/admin/anggota/peminjam/editpeminjam/{id}', [PeminjamController::class,'editPeminjam'])->name('peminjam.edit');
Route::post('/perpustakaan/admin/anggota/peminjam/updatepeminjam/{id}', [PeminjamController::class,'updatePeminjam'])->name('peminjam.update');
Route::delete('/perpustakaan/admin/anggota/peminjam/hapuspeminjam/{id}', [PeminjamController::class,'hapusPeminjam'])->name('peminjam.delete');
Route::get('/perpustakaan/admin/anggota/dashboard',[AnggotaController::class,'index'])->name('admin.listanggota');
Route::get('/perpustakaan/admin/anggota/tambahanggota', [AnggotaController::class,'tambahanggota'])->name('admin.tambahanggota');
Route::post('/perpustakaan/admin/anggota/uploadanggota', [AnggotaController::class,'uploadanggota'])->name('admin.uploadanggota');
Route::get('/perpustakaan/admin/anggota/editanggota/{id}', [AnggotaController::class,'editanggota'])->name('admin.editanggota');
Route::post('/perpustakaan/admin/anggota/updateanggota/{id}', [AnggotaController::class,'updateanggota'])->name('admin.updateanggota');
Route::delete('/perpustakaan/admin/anggota/hapusanggota{id}', [AnggotaController::class,'hapusanggota'])->name('admin.hapusanggota');


// Route::middleware(['auth', 'role:admin'])->group(function () {
    
// });


//member routes
Route::middleware(['auth', 'role:anggota'])->group(function () {
Route::get('/perpustakaan/anggota/dashboard', function ($id) {
    
});
    
});

//peminjam routes

//petugas routes
Route::middleware(['auth', 'role:petugas'])->group(function () {
    
Route::get('/perpustakaan/petugas/dashboard', [PetugasController::class,'index'])->name('admin.listpetugas');
});

Route::get('/test-pdf', [TestPDF::class,'generatePDF']);