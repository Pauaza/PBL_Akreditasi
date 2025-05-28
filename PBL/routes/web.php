<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaAdminController;
use App\Http\Controllers\Kriteria2AdminController;
use App\Http\Controllers\Kriteria3AdminController;
use App\Http\Controllers\Kriteria4AdminController;
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
    // Kriteria 1
    Route::get('/kriteria/admin/kriteria1/create', [KriteriaAdminController::class, 'create'])->name('kriteria.admin.kriteria1');
    Route::get('/kriteria/admin/kriteria1/', [KriteriaAdminController::class, 'index'])->name('index.admin.kriteria1');
    Route::get('/kriteria/admin/kriteria1/edit/{id}', [KriteriaAdminController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/admin/kriteria1/update/{id}', [KriteriaAdminController::class, 'update'])->name('kriteria.update');
    Route::post('/kriteria/submit', [KriteriaAdminController::class, 'submitKriteria'])->name('kriteria.submit');
    Route::get('/kriteria/admin/kriteria1/view/{id}', [KriteriaAdminController::class, 'show'])->name('kriteria1.show');
    Route::get('/kriteria/admin/kriteria1/print/{id}', [KriteriaAdminController::class, 'print']);

    // Kriteria 1 - Store per bagian
    Route::post('/admin/kriteria1/penetapan', [KriteriaAdminController::class, 'storePenetapan'])->name('kriteria1.penetapan.store');
    Route::post('/admin/kriteria1/pelaksanaan', [KriteriaAdminController::class, 'storePelaksaan'])->name('kriteria1.pelaksanaan.store');
    Route::post('/admin/kriteria1/evaluasi', [KriteriaAdminController::class, 'storeEvaluasi'])->name('kriteria1.evaluasi.store');
    Route::post('/admin/kriteria1/pengendalian', [KriteriaAdminController::class, 'storePengendalian'])->name('kriteria1.pengendalian.store');
    Route::post('/admin/kriteria1/peningkatan', [KriteriaAdminController::class, 'storePeningkatan'])->name('kriteria1.peningkatan.store');

    // Kriteria 2
    Route::get('/kriteria/admin/kriteria2/create', [Kriteria2AdminController::class, 'create'])->name('kriteria.admin.kriteria2');
    Route::get('/kriteria/admin/kriteria2/', [Kriteria2AdminController::class, 'index'])->name('index.admin.kriteria2');
    Route::get('/kriteria/admin/kriteria2/edit/{id}', [Kriteria2AdminController::class, 'edit'])->name('kriteria2.edit');
    Route::put('/kriteria/admin/kriteria2/update/{id}', [Kriteria2AdminController::class, 'update'])->name('kriteria2.update');
    Route::post('/kriteria/submit', [Kriteria2AdminController::class, 'submitKriteria'])->name('kriteria2.submit');
    Route::get('/kriteria/admin/kriteria2/view/{id}', [Kriteria2AdminController::class, 'show'])->name('kriteria2.show');
    Route::get('/kriteria/admin/kriteria2/print/{id}', [Kriteria2AdminController::class, 'print']);
    
    // Kriteria 2 - Store per bagian
    Route::post('/admin/kriteria2/penetapan', [Kriteria2AdminController::class, 'storePenetapan'])->name('kriteria2.penetapan.store');
    Route::post('/admin/kriteria2/pelaksanaan', [Kriteria2AdminController::class, 'storePelaksaan'])->name('kriteria2.pelaksanaan.store');
    Route::post('/admin/kriteria2/evaluasi', [Kriteria2AdminController::class, 'storeEvaluasi'])->name('kriteria2.evaluasi.store');
    Route::post('/admin/kriteria2/pengendalian', [Kriteria2AdminController::class, 'storePengendalian'])->name('kriteria2.pengendalian.store');
    Route::post('/admin/kriteria2/peningkatan', [Kriteria2AdminController::class, 'storePeningkatan'])->name('kriteria2.peningkatan.store');

    // Kriteria 3
    Route::get('/kriteria/admin/kriteria3/create', [Kriteria3AdminController::class, 'create'])->name('kriteria.admin.kriteria3');
    Route::get('/kriteria/admin/kriteria3/', [Kriteria3AdminController::class, 'index'])->name('index.admin.kriteria3');
    Route::get('/kriteria/admin/kriteria3/edit/{id}', [Kriteria3AdminController::class, 'edit'])->name('kriteria3.edit');
    Route::put('/kriteria/admin/kriteria3/update/{id}', [Kriteria3AdminController::class, 'update'])->name('kriteria3.update');
    Route::post('/kriteria/submit', [Kriteria3AdminController::class, 'submitKriteria'])->name('kriteria3.submit');
    Route::get('/kriteria/admin/kriteria3/view/{id}', [Kriteria3AdminController::class, 'show'])->name('kriteria3.show');
    Route::get('/kriteria/admin/kriteria3/print/{id}', [Kriteria3AdminController::class, 'print']);
    
    // Kriteria 3 - Store per bagian
    Route::post('/admin/kriteria3/penetapan', [Kriteria3AdminController::class, 'storePenetapan'])->name('kriteria3.penetapan.store');
    Route::post('/admin/kriteria3/pelaksanaan', [Kriteria3AdminController::class, 'storePelaksaan'])->name('kriteria3.pelaksanaan.store');
    Route::post('/admin/kriteria3/evaluasi', [Kriteria3AdminController::class, 'storeEvaluasi'])->name('kriteria3.evaluasi.store');
    Route::post('/admin/kriteria3/pengendalian', [Kriteria3AdminController::class, 'storePengendalian'])->name('kriteria3.pengendalian.store');
    Route::post('/admin/kriteria3/peningkatan', [Kriteria3AdminController::class, 'storePeningkatan'])->name('kriteria3.peningkatan.store');

        // Kriteria 4
    Route::get('/kriteria/admin/kriteria4/create', [Kriteria4AdminController::class, 'create'])->name('kriteria.admin.kriteria4');
    Route::get('/kriteria/admin/kriteria4/', [Kriteria4AdminController::class, 'index'])->name('index.admin.kriteria4');
    Route::get('/kriteria/admin/kriteria4/edit/{id}', [Kriteria4AdminController::class, 'edit'])->name('kriteria4.edit');
    Route::put('/kriteria/admin/kriteria4/update/{id}', [Kriteria4AdminController::class, 'update'])->name('kriteria4.update');
    Route::post('/kriteria/submit', [Kriteria4AdminController::class, 'submitKriteria'])->name('kriteria4.submit');
    Route::get('/kriteria/admin/kriteria4/view/{id}', [Kriteria4AdminController::class, 'show'])->name('kriteria4.show');
    Route::get('/kriteria/admin/kriteria4/print/{id}', [Kriteria4AdminController::class, 'print']);
    
    // Kriteria 4 - Store per bagian
    Route::post('/admin/kriteria4/penetapan', [Kriteria4AdminController::class, 'storePenetapan'])->name('kriteria4.penetapan.store');
    Route::post('/admin/kriteria4/pelaksanaan', [Kriteria4AdminController::class, 'storePelaksaan'])->name('kriteria4.pelaksanaan.store');
    Route::post('/admin/kriteria4/evaluasi', [Kriteria4AdminController::class, 'storeEvaluasi'])->name('kriteria4.evaluasi.store');
    Route::post('/admin/kriteria4/pengendalian', [Kriteria4AdminController::class, 'storePengendalian'])->name('kriteria4.pengendalian.store');
    Route::post('/admin/kriteria4/peningkatan', [Kriteria4AdminController::class, 'storePeningkatan'])->name('kriteria4.peningkatan.store');

});

Route::middleware(['auth', 'authorize:KPS,KJR,KJM,DIR'])->group(function () {
    Route::get('/dashboard_validator', [ValidatorDashboardController::class, 'index'])->name('dashboard_validator');
    Route::get('/kriteria/validator/kriteria1', [KriteriaValidatorController::class, 'index'])->name('kriteria.validator.kriteria1');
});


