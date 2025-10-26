<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonasiTunaiController;
use App\Http\Controllers\DonasiMakananController;
use App\Http\Controllers\ListDonasiController;
use App\Http\Controllers\ProfileController;

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
    return view('login');
});

Route::get('/lokasi', function () {
    return view('lokasi');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/donasi', [DonationController::class, 'index'])->name('donasi');

Route::post('/donasi/submit', [DonationController::class, 'submit'])->name('donasi.submit');

Route::get('/donasi/makanan', function () {
    return view('donasi.makanan');
})->name('donasi.makanan');

Route::get('/donasi/tunai', function () {
    return view('donasi.tunai');
})->name('donasi.tunai');

Route::post('/donasi-tunai', [DonasiTunaiController::class, 'store'])->name('donasi.tunai.store');

Route::post('/donasi-makanan', [DonasiMakananController::class, 'store'])->name('donasi.makanan.store');

Route::get('/list-donasi', [ListDonasiController::class, 'index'])->name('list.donasi');

Route::delete('/donasi-tunai/{id}', [DonasiTunaiController::class, 'destroy'])->name('donasi.tunai.destroy');

Route::delete('/donasi-makanan/{id}', [DonasiMakananController::class, 'destroy'])->name('donasi.makanan.destroy');

Route::get('/donasi.makanan/{id}', [DonasiMakananController::class, 'show'])->name('donasi.makanan.show');

Route::get('/donasi.tunai/{id}', [DonasiTunaiController::class, 'show'])->name('donasi.tunai.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
