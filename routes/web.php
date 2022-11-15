<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BukutamuController,
    LoginController,
    HomeController,
    UserController,
    TamuController,
    PegawaiController,
    TujuanController
};

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

// Route::middleware(['belum_login'])->group(function () {
Route::get('/', [LoginController::class, 'index'])->name('/');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
// });

Route::get('home', [HomeController::class, 'index'])->name('home');
// Route::middleware(['sudah_login'])->group(function () {


//User
Route::get('user', [UserController::class, 'index'])->name('user');
Route::get('user/input', [UserController::class, 'add'])->name('input-user');
Route::post('user/save', [UserController::class, 'save'])->name('save-user');
Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::post('user/update/{id}', [UserController::class, 'update'])->name('update-user');
Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('delete-user');

//Tamu
Route::get('tamu', [TamuController::class, 'index'])->name('tamu');
Route::get('tamu/input', [TamuController::class, 'add'])->name('input-tamu');
Route::post('tamu/save', [TamuController::class, 'save'])->name('save-tamu');
Route::get('tamu/edit/{id}', [TamuController::class, 'edit'])->name('edit-tamu');
Route::post('tamu/update/{id}', [TamuController::class, 'update'])->name('update-tamu');
Route::get('tamu/delete/{id}', [TamuController::class, 'delete'])->name('delete-tamu');

//Pegawai
Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('pegawai/input', [PegawaiController::class, 'add'])->name('input-pegawai');
Route::post('pegawai/save', [PegawaiController::class, 'save'])->name('save-pegawai');
Route::get('pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('edit-pegawai');
Route::post('pegawai/update/{id}', [PegawaiController::class, 'update'])->name('update-pegawai');
Route::get('pegawai/delete/{id}', [PegawaiController::class, 'delete'])->name('delete-pegawai');

//Tujuan
Route::get('tujuan', [TujuanController::class, 'index'])->name('tujuan');
Route::get('tujuan/input', [TujuanController::class, 'add'])->name('input-tujuan');
Route::post('tujuan/save', [TujuanController::class, 'save'])->name('save-tujuan');
Route::get('tujuan/edit/{id}', [TujuanController::class, 'edit'])->name('edit-tujuan');
Route::post('tujuan/update/{id}', [TujuanController::class, 'update'])->name('update-tujuan');
Route::get('tujuan/delete/{id}', [TujuanController::class, 'delete'])->name('delete-tujuan');
// });

Route::get('/', [BukutamuController::class, 'index']);
Route::get('pemanggilan', [BukutamuController::class, 'pemanggilan'])->name('pemanggilan');

