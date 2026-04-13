<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Kuesioner
Route::get('/kuesioner', [KuesionerController::class, 'index'])->name('kuesioner');
Route::post('/kuesioner', [KuesionerController::class, 'store'])->name('kuesioner.store');

// Hasil rekomendasi
Route::get('/hasil/{id}', [HasilController::class, 'show'])->name('hasil.show');

// ========== ROUTE LOGIN ==========
Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// ========== ROUTE LOGOUT (DUA VERSI) ==========
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// ========== ADMIN ROUTES ==========
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/data-responses', [AdminController::class, 'dataResponses'])->name('data-responses');
    Route::get('/response/{id}', [AdminController::class, 'showResponse'])->name('show-response');
    Route::delete('/response/{id}', [AdminController::class, 'deleteResponse'])->name('delete-response');
    Route::get('/bobot', [AdminController::class, 'bobotIndex'])->name('bobot');
    Route::post('/bobot', [AdminController::class, 'bobotUpdate'])->name('bobot.update');
});