<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaAdminController;
use App\Http\Controllers\KriteriaValidatorController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ValidatorDashboardController;

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

// Halaman awal
Route::get('/', [WelcomeController::class, 'index']);

// Login & Logout
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Group route yang hanya bisa diakses setelah login
Route::middleware(['auth', 'authorize:ADM'])->group(function () {
    Route::get('/dashboard_admin', [AdminDashboardController::class, 'index'])->name('dashboard_admin');
    Route::get('/kriteria/admin/kriteria1/create', [KriteriaAdminController::class, 'create'])->name('kriteria.admin.kriteria1');
    Route::get('/kriteria/admin/kriteria1/', [KriteriaAdminController::class, 'index'])->name('index.admin.kriteria1');
    Route::get('/kriteria/admin/kriteria1/edit/{id}', [KriteriaAdminController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/admin/kriteria1/update/{id}', [KriteriaAdminController::class, 'update'])->name('kriteria.update');

    // Kriteria 1 - Store per bagian
    Route::post('/admin/kriteria1/penetapan', [KriteriaAdminController::class, 'storePenetapan'])->name('kriteria1.penetapan.store');
    Route::post('/admin/kriteria1/pelaksanaan', [KriteriaAdminController::class, 'storePelaksaan'])->name('kriteria1.pelaksanaan.store');
    Route::post('/admin/kriteria1/evaluasi', [KriteriaAdminController::class, 'storeEvaluasi'])->name('kriteria1.evaluasi.store');
    Route::post('/admin/kriteria1/pengendalian', [KriteriaAdminController::class, 'storePengendalian'])->name('kriteria1.pengendalian.store');
    Route::post('/admin/kriteria1/peningkatan', [KriteriaAdminController::class, 'storePeningkatan'])->name('kriteria1.peningkatan.store');

    // Tambahan route untuk tombol Submit, Save, Edit (aksi gabungan)
    Route::post('/kriteria/submit', [KriteriaAdminController::class, 'submitKriteria'])->name('kriteria.submit');

    Route::get('/kriteria/admin/kriteria1/view/{id}', [KriteriaAdminController::class, 'show'])->name('kriteria1.show');
});

Route::middleware(['auth', 'authorize:KPS,KJR,KJM,DIR'])->group(function () {
    Route::get('/dashboard_validator', [ValidatorDashboardController::class, 'index'])->name('dashboard_validator');
    Route::get('/kriteria/validator/kriteria1', [KriteriaValidatorController::class, 'index'])->name('kriteria.validator.kriteria1');
});


