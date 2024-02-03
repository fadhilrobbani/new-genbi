<?php

use App\Models\PanitiaKegiatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserViewController;
use App\Http\Controllers\KomisariatController;
use App\Http\Controllers\JabatanUserController;
use App\Http\Controllers\LevelKegiatanController;
use App\Http\Controllers\JabatanKegiatanController;
use App\Http\Controllers\PanitiaKegiatanController;
use App\Http\Controllers\PesertaKegiatanController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/kegiatan/{kegiatan}/{panitia}/createPanitia', [UserViewController::class, 'createPanitia'])->name('kegiatan.panitia.create');
    Route::get('/kegiatan/{kegiatan}/createPeserta', [UserViewController::class, 'createPeserta'])->name('kegiatan.peserta.create');
});

Route::get('/', [UserViewController::class, 'index'])->name('landing');
Route::get('/kegiatan/{kegiatan}', [UserViewController::class, 'kegiatan'])->name('kegiatan.user');
Route::get('/leaderboard', [UserViewController::class, 'leaderboard'])->name('leaderboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan')->middleware('auth');
    Route::get('/kegiatan/create/baru', [KegiatanController::class, 'create'])->name('kegiatan.create')->middleware('auth');
    Route::post('/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.store')->middleware('auth');
    Route::get('/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit')->middleware('auth');
    Route::put('/kegiatan/edit/{kegiatan}', [KegiatanController::class, 'update'])->name('kegiatan.update')->middleware('auth');
    Route::delete('/kegiatan/delete/{kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.delete')->middleware('auth');

    Route::get('/komisariat', [KomisariatController::class, 'index'])->name('komisariat')->middleware('auth');
    Route::get('/komisariat/create', [KomisariatController::class, 'create'])->name('komisariat.create')->middleware('auth');
    Route::post('/komisariat/add', [KomisariatController::class, 'store'])->name('komisariat.add')->middleware('auth');
    Route::get('/komisariat/{komisariat}/edit', [KomisariatController::class, 'edit'])->name('komisariat.edit')->middleware('auth');
    Route::put('/komisariat/edit/{komisariat}', [KomisariatController::class, 'update'])->name('komisariat.update')->middleware('auth');
    Route::delete('/komisariat/delete/{komisariat}', [KomisariatController::class, 'destroy'])->name('komisariat.delete')->middleware('auth');

    Route::get('/jabatan-user', [JabatanUserController::class, 'index'])->name('jabatanuser')->middleware('auth');
    Route::get('/jabatan-user/create', [JabatanUserController::class, 'create'])->name('jabatanuser.create')->middleware('auth');
    Route::post('/jabatan-user/add', [JabatanUserController::class, 'store'])->name('jabatanuser.add')->middleware('auth');
    Route::get('/jabatan-user/{jabatan}/edit', [JabatanUserController::class, 'edit'])->name('jabatanuser.edit')->middleware('auth');
    Route::put('/jabatan-user/edit/{jabatan}', [JabatanUserController::class, 'update'])->name('jabatanuser.update')->middleware('auth');
    Route::delete('/jabatan-user/delete/{jabatan}', [JabatanUserController::class, 'destroy'])->name('jabatanuser.delete')->middleware('auth');

    Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
    Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete')->middleware('auth');
    Route::get('/user/{user}/profile', [UserController::class, 'show'])->name('user.profile')->middleware('auth');
    Route::get('/user/profile/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');
    Route::post('/user/profile/add', [UserController::class, 'store'])->name('user.add')->middleware('auth');
    Route::post('/user/profile/update-foto/{user}', [UserController::class, 'updateFoto'])->name('user.updatefoto')->middleware('auth');
    Route::put('/user/profile/edit/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');

    Route::get('/jabatan', [JabatanKegiatanController::class, 'index'])->name('jabatan')->middleware('auth');
    Route::get('/jabatan/create', [JabatanKegiatanController::class, 'create'])->name('jabatan')->middleware('auth');
    Route::post('/jabatan/add', [JabatanKegiatanController::class, 'store'])->name('jabatan.add')->middleware('auth');
    Route::get('/jabatan/{jabatan}/edit', [JabatanKegiatanController::class, 'edit'])->name('jabatan.edit')->middleware('auth');
    Route::put('/jabatan/edit/{jabatan}', [JabatanKegiatanController::class, 'update'])->name('jabatan.update')->middleware('auth');
    Route::delete('/jabatan/delete/{jabatan}', [JabatanKegiatanController::class, 'destroy'])->name('jabatan.delete')->middleware('auth');

    Route::get('/panitia-kegiatan', [PanitiaKegiatanController::class, 'index'])->name('panitia-kegiatan')->middleware('auth');
    Route::get('/panitia-kegiatan/lihat/{kegiatan}', [PanitiaKegiatanController::class, 'lihatPanitia'])->name('panitia-kegiatan.lihat-panitia')->middleware('auth');
    Route::post('/panitia-kegiatan/setuju/{kegiatan}', [PanitiaKegiatanController::class, 'setuju'])->name('panitia-kegiatan.setuju')->middleware('auth');
    Route::post('/panitia-kegiatan/tolak/{kegiatan}', [PanitiaKegiatanController::class, 'tolak'])->name('panitia-kegiatan.tolak')->middleware('auth');
    // Route::get('/panitia-kegiatan/create', [PanitiaKegiatanController::class, 'create'])->name('panitia-kegiatan.create')->middleware('auth');
    // Route::post('/panitia-kegiatan/add', [PanitiaKegiatanController::class, 'store'])->name('panitia-kegiatan.add')->middleware('auth');
    // Route::get('/panitia-kegiatan/{panitiaKegiatan}/edit', [PanitiaKegiatanController::class, 'edit'])->name('panitia-kegiatan.edit')->middleware('auth');
    // Route::put('/panitia-kegiatan/edit/{panitiaKegiatan}', [PanitiaKegiatanController::class, 'update'])->name('panitia-kegiatan.update')->middleware('auth');
    // Route::delete('/panitia-kegiatan/delete/{jabatan}', [PanitiaKegiatanController::class, 'destroy'])->name('panitia-kegiatan.delete')->middleware('auth');

    Route::get('/peserta-kegiatan', [PesertaKegiatanController::class, 'index'])->name('peserta-kegiatan')->middleware('auth');
    Route::get('/peserta-kegiatan/lihat/{kegiatan}', [PesertaKegiatanController::class, 'lihatPeserta'])->name('peserta-kegiatan.lihat-peserta')->middleware('auth');
    Route::post('/peserta-kegiatan/setuju/{kegiatan}', [PesertaKegiatanController::class, 'setuju'])->name('peserta-kegiatan.setuju')->middleware('auth');
    Route::post('/peserta-kegiatan/tolak/{kegiatan}', [PesertaKegiatanController::class, 'tolak'])->name('peserta-kegiatan.tolak')->middleware('auth');

    Route::get('/level-kegiatan', [LevelKegiatanController::class, 'index'])->name('level')->middleware('auth');
    Route::get('/level-kegiatan/create', [LevelKegiatanController::class, 'create'])->name('level.create')->middleware('auth');
    Route::post('/level-kegiatan/add', [LevelKegiatanController::class, 'store'])->name('level.add')->middleware('auth');
    Route::get('/level-kegiatan/{level}/edit', [LevelKegiatanController::class, 'edit'])->name('level.edit')->middleware('auth');
    Route::put('/level-kegiatan/edit/{level}', [LevelKegiatanController::class, 'update'])->name('level.update')->middleware('auth');
    Route::delete('/level-kegiatan/delete/{level}', [LevelKegiatanController::class, 'destroy'])->name('level.delete')->middleware('auth');

    Route::get('/manajemen-berita', [BeritaController::class, 'index'])->name('berita')->middleware('auth');
    Route::get('/manajemen-berita/create', [BeritaController::class, 'create'])->name('berita.create')->middleware('auth');
    Route::post('/manajemen-berita/add', [BeritaController::class, 'store'])->name('berita.store')->middleware('auth');
    Route::get('/manajemen-berita/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit')->middleware('auth');
    Route::put('/manajemen-berita/edit/{berita}', [BeritaController::class, 'update'])->name('berita.update')->middleware('auth');
    Route::delete('/manajemen-berita/delete/{berita}', [BeritaController::class, 'destroy'])->name('berita.delete')->middleware('auth');

    Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
    Route::post('/profile/update-foto/{user}', [UserController::class, 'updateFotoUser'])->name('profile.updatefoto')->middleware('auth');
    Route::put('profile/edit/{user}', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
});
