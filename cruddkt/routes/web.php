<?php

use App\Http\Controllers\MhsController;
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
    return view('welcome');
});

Route::get('mhs', [MhsController::class, 'index'])->name('mhs.index');//menampilkan data mahasiswwa
Route::get('mhs/create', [MhsController::class, 'create'])->name('mhs.create');//menampilkan form tambah data mahasiswa
Route::post('mhs', [MhsController::class, 'store'])->name('mhs.store');//menyimpan data mahasiswa baru
Route::get('mhs/{mhs}/edit', [MhsController::class, 'edit'])->name('mhs.edit');//menampilkan form edit data mahasiswa
Route::put('mhs/{mhs}', [MhsController::class, 'update'])->name('mhs.update');// Route untuk mengupdate data mahasiswa
Route::get('mhs/{mhs}/delete', [MhsController::class, 'destroy'])->name('mhs.delete'); //menghapus data mahasiswa
Route::resource('mhs', MhsController::class);