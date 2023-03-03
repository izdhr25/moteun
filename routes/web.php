<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\ExportAllTaniController;

Route::get('/', [App\Http\Controllers\MoterController::class, 'index']);
Route::get('/tentang', [App\Http\Controllers\MoterController::class, 'tentang']);
Route::get('/layanan', [App\Http\Controllers\MoterController::class, 'layanan']);
Route::get('/tanis', [App\Http\Controllers\MoterController::class, 'tanis']);
Route::get('/ternaks', [App\Http\Controllers\MoterController::class, 'ternaks']);
Route::get('/artikels', [App\Http\Controllers\MoterController::class, 'artikels']);
Route::get('/forum', [App\Http\Controllers\MoterController::class, 'forum']);
Route::get('artikels/detail/{id}', 'App\Http\Controllers\MoterController@detail')->name('artikels.detail');


Auth::routes();

// Register User
Route::get('/register', [DaftarController::class, 'index']);
Route::post('/register', [DaftarController::class, 'store']);



// jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/login', [HomeController::class, 'dologin']);
    Route::post('/logout', [HomeController::class, 'logout']);
});

// untuk admin dan user
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::get('/logout', [HomeController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/admin', [AdminController::class, 'index']);

    // Halaman Admin
    Route::resource('akunadmin', App\Http\Controllers\AdminAkunController::class);
    Route::resource('akunuser', App\Http\Controllers\UserAkunController::class);
    Route::resource('allobat', App\Http\Controllers\AllObatController::class);
    Route::resource('allkondisi', App\Http\Controllers\AllKondisiController::class);
    Route::resource('alltani', App\Http\Controllers\AllTaniController::class);
    Route::resource('allternak', App\Http\Controllers\AllTernakController::class);
    Route::resource('allartikel', App\Http\Controllers\AllArtikelController::class);
    Route::resource('allalert', App\Http\Controllers\AllAlertController::class);
    Route::resource('allgrow', App\Http\Controllers\AllGrowController::class);
    Route::resource('allmetode', App\Http\Controllers\AllMetodeController::class);
    Route::resource('about', App\Http\Controllers\TentangController::class);
    Route::resource('kontak', App\Http\Controllers\KontakController::class);
    Route::resource('jenistani', App\Http\Controllers\JenisTaniController::class);
    Route::resource('jenisternak', App\Http\Controllers\JenisTernakController::class);

    // Register Admin
    Route::get('/registeradmin', [RegisterAdminController::class, 'index']);
    Route::post('/registeradmin', [RegisterAdminController::class, 'store']);

    // Export Excel
    Route::get('/exportalltani', [ExportAllTaniController::class, 'export'])->name('exportalltani');
});

// untuk user
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/user', [UserController::class, 'index']);
   
    // Halaman Admin
    Route::resource('akun', App\Http\Controllers\AkunController::class);
    Route::resource('obat', App\Http\Controllers\ObatController::class);
    Route::resource('kondisi', App\Http\Controllers\KondisiController::class);
    Route::resource('tani', App\Http\Controllers\TaniController::class);
    Route::resource('ternak', App\Http\Controllers\TernakController::class);
    Route::resource('artikel', App\Http\Controllers\ArtikelController::class);
    Route::resource('alert', App\Http\Controllers\AlertController::class);
    Route::resource('grow', App\Http\Controllers\GrowController::class);
    Route::resource('metode', App\Http\Controllers\MetodeController::class);
});