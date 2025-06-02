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
use App\Http\Controllers\Kriteria5AdminController;
use App\Http\Controllers\Kriteria6AdminController;
use App\Http\Controllers\Kriteria7AdminController;
use App\Http\Controllers\Kriteria8AdminController;
use App\Http\Controllers\Kriteria9AdminController;
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
    Route::post('/kriteria1/submit', [KriteriaAdminController::class, 'submitKriteria'])->name('kriteria.submit');
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
    Route::post('/kriteria2/submit', [Kriteria2AdminController::class, 'submitKriteria'])->name('kriteria2.submit');
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
    Route::post('/kriteria3/submit', [Kriteria3AdminController::class, 'submitKriteria'])->name('kriteria3.submit');
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
    Route::post('/kriteria4/submit', [Kriteria4AdminController::class, 'submitKriteria'])->name('kriteria4.submit');
    Route::get('/kriteria/admin/kriteria4/view/{id}', [Kriteria4AdminController::class, 'show'])->name('kriteria4.show');
    Route::get('/kriteria/admin/kriteria4/print/{id}', [Kriteria4AdminController::class, 'print']);

    // Kriteria 4 - Store per bagian
    Route::post('/admin/kriteria4/penetapan', [Kriteria4AdminController::class, 'storePenetapan'])->name('kriteria4.penetapan.store');
    Route::post('/admin/kriteria4/pelaksanaan', [Kriteria4AdminController::class, 'storePelaksaan'])->name('kriteria4.pelaksanaan.store');
    Route::post('/admin/kriteria4/evaluasi', [Kriteria4AdminController::class, 'storeEvaluasi'])->name('kriteria4.evaluasi.store');
    Route::post('/admin/kriteria4/pengendalian', [Kriteria4AdminController::class, 'storePengendalian'])->name('kriteria4.pengendalian.store');
    Route::post('/admin/kriteria4/peningkatan', [Kriteria4AdminController::class, 'storePeningkatan'])->name('kriteria4.peningkatan.store');

    // Kriteria 5
    Route::get('/kriteria/admin/kriteria5/create', [Kriteria5AdminController::class, 'create'])->name('kriteria.admin.kriteria5');
    Route::get('/kriteria/admin/kriteria5/', [Kriteria5AdminController::class, 'index'])->name('index.admin.kriteria5');
    Route::get('/kriteria/admin/kriteria5/edit/{id}', [Kriteria5AdminController::class, 'edit'])->name('kriteria5.edit');
    Route::put('/kriteria/admin/kriteria5/update/{id}', [Kriteria5AdminController::class, 'update'])->name('kriteria5.update');
    Route::post('/kriteria5/submit', [Kriteria5AdminController::class, 'submitKriteria'])->name('kriteria5.submit');
    Route::get('/kriteria/admin/kriteria5/view/{id}', [Kriteria5AdminController::class, 'show'])->name('kriteria5.show');
    Route::get('/kriteria/admin/kriteria5/print/{id}', [Kriteria5AdminController::class, 'print']);

    // Kriteria 5 - Store per bagian
    Route::post('/admin/kriteria5/penetapan', [Kriteria5AdminController::class, 'storePenetapan'])->name('kriteria5.penetapan.store');
    Route::post('/admin/kriteria5/pelaksanaan', [Kriteria5AdminController::class, 'storePelaksaan'])->name('kriteria5.pelaksanaan.store');
    Route::post('/admin/kriteria5/evaluasi', [Kriteria5AdminController::class, 'storeEvaluasi'])->name('kriteria5.evaluasi.store');
    Route::post('/admin/kriteria5/pengendalian', [Kriteria5AdminController::class, 'storePengendalian'])->name('kriteria5.pengendalian.store');
    Route::post('/admin/kriteria5/peningkatan', [Kriteria5AdminController::class, 'storePeningkatan'])->name('kriteria5.peningkatan.store');

    // Kriteria 6
    Route::get('/kriteria/admin/kriteria6/create', [Kriteria6AdminController::class, 'create'])->name('kriteria.admin.kriteria6');
    Route::get('/kriteria/admin/kriteria6/', [Kriteria6AdminController::class, 'index'])->name('index.admin.kriteria6');
    Route::get('/kriteria/admin/kriteria6/edit/{id}', [Kriteria6AdminController::class, 'edit'])->name('kriteria6.edit');
    Route::put('/kriteria/admin/kriteria6/update/{id}', [Kriteria6AdminController::class, 'update'])->name('kriteria6.update');
    Route::post('/kriteria6/submit', [Kriteria6AdminController::class, 'submitKriteria'])->name('kriteria6.submit');
    Route::get('/kriteria/admin/kriteria6/view/{id}', [Kriteria6AdminController::class, 'show'])->name('kriteria6.show');
    Route::get('/kriteria/admin/kriteria6/print/{id}', [Kriteria6AdminController::class, 'print']);

    // Kriteria 6 - Store per bagian
    Route::post('/admin/kriteria6/penetapan', [Kriteria6AdminController::class, 'storePenetapan'])->name('kriteria6.penetapan.store');
    Route::post('/admin/kriteria6/pelaksanaan', [Kriteria6AdminController::class, 'storePelaksaan'])->name('kriteria6.pelaksanaan.store');
    Route::post('/admin/kriteria6/evaluasi', [Kriteria6AdminController::class, 'storeEvaluasi'])->name('kriteria6.evaluasi.store');
    Route::post('/admin/kriteria6/pengendalian', [Kriteria6AdminController::class, 'storePengendalian'])->name('kriteria6.pengendalian.store');
    Route::post('/admin/kriteria6/peningkatan', [Kriteria6AdminController::class, 'storePeningkatan'])->name('kriteria6.peningkatan.store');

    // Kriteria 7
    Route::get('/kriteria/admin/kriteria7/create', [Kriteria7AdminController::class, 'create'])->name('kriteria.admin.kriteria7');
    Route::get('/kriteria/admin/kriteria7/', [Kriteria7AdminController::class, 'index'])->name('index.admin.kriteria7');
    Route::get('/kriteria/admin/kriteria7/edit/{id}', [Kriteria7AdminController::class, 'edit'])->name('kriteria7.edit');
    Route::put('/kriteria/admin/kriteria7/update/{id}', [Kriteria7AdminController::class, 'update'])->name('kriteria7.update');
    Route::post('/kriteria7/submit', [Kriteria7AdminController::class, 'submitKriteria'])->name('kriteria7.submit');
    Route::get('/kriteria/admin/kriteria7/view/{id}', [Kriteria7AdminController::class, 'show'])->name('kriteria7.show');
    Route::get('/kriteria/admin/kriteria7/print/{id}', [Kriteria7AdminController::class, 'print']);

    // Kriteria 7 - Store per bagian
    Route::post('/admin/kriteria7/penetapan', [Kriteria7AdminController::class, 'storePenetapan'])->name('kriteria7.penetapan.store');
    Route::post('/admin/kriteria7/pelaksanaan', [Kriteria7AdminController::class, 'storePelaksaan'])->name('kriteria7.pelaksanaan.store');
    Route::post('/admin/kriteria7/evaluasi', [Kriteria7AdminController::class, 'storeEvaluasi'])->name('kriteria7.evaluasi.store');
    Route::post('/admin/kriteria7/pengendalian', [Kriteria7AdminController::class, 'storePengendalian'])->name('kriteria7.pengendalian.store');
    Route::post('/admin/kriteria7/peningkatan', [Kriteria7AdminController::class, 'storePeningkatan'])->name('kriteria7.peningkatan.store');

    // Kriteria 8
    Route::get('/kriteria/admin/kriteria8/create', [Kriteria8AdminController::class, 'create'])->name('kriteria.admin.kriteria8');
    Route::get('/kriteria/admin/kriteria8/', [Kriteria8AdminController::class, 'index'])->name('index.admin.kriteria8');
    Route::get('/kriteria/admin/kriteria8/edit/{id}', [Kriteria8AdminController::class, 'edit'])->name('kriteria8.edit');
    Route::put('/kriteria/admin/kriteria8/update/{id}', [Kriteria8AdminController::class, 'update'])->name('kriteria8.update');
    Route::post('/kriteria8/submit', [Kriteria8AdminController::class, 'submitKriteria'])->name('kriteria8.submit');
    Route::get('/kriteria/admin/kriteria8/view/{id}', [Kriteria8AdminController::class, 'show'])->name('kriteria8.show');
    Route::get('/kriteria/admin/kriteria8/print/{id}', [Kriteria8AdminController::class, 'print']);

    // Kriteria 8 - Store per bagian
    Route::post('/admin/kriteria8/penetapan', [Kriteria8AdminController::class, 'storePenetapan'])->name('kriteria8.penetapan.store');
    Route::post('/admin/kriteria8/pelaksanaan', [Kriteria8AdminController::class, 'storePelaksaan'])->name('kriteria8.pelaksanaan.store');
    Route::post('/admin/kriteria8/evaluasi', [Kriteria8AdminController::class, 'storeEvaluasi'])->name('kriteria8.evaluasi.store');
    Route::post('/admin/kriteria8/pengendalian', [Kriteria8AdminController::class, 'storePengendalian'])->name('kriteria8.pengendalian.store');
    Route::post('/admin/kriteria8/peningkatan', [Kriteria8AdminController::class, 'storePeningkatan'])->name('kriteria8.peningkatan.store');

    // Kriteria 9
    Route::get('/kriteria/admin/kriteria9/create', [Kriteria9AdminController::class, 'create'])->name('kriteria.admin.kriteria9');
    Route::get('/kriteria/admin/kriteria9/', [Kriteria9AdminController::class, 'index'])->name('index.admin.kriteria9');
    Route::get('/kriteria/admin/kriteria9/edit/{id}', [Kriteria9AdminController::class, 'edit'])->name('kriteria9.edit');
    Route::put('/kriteria/admin/kriteria9/update/{id}', [Kriteria9AdminController::class, 'update'])->name('kriteria9.update');
    Route::post('/kriteria9/submit', [Kriteria9AdminController::class, 'submitKriteria'])->name('kriteria9.submit');
    Route::get('/kriteria/admin/kriteria9/view/{id}', [Kriteria9AdminController::class, 'show'])->name('kriteria9.show');
    Route::get('/kriteria/admin/kriteria9/print/{id}', [Kriteria9AdminController::class, 'print']);

    // Kriteria 9 - Store per bagian
    Route::post('/admin/kriteria9/penetapan', [Kriteria9AdminController::class, 'storePenetapan'])->name('kriteria9.penetapan.store');
    Route::post('/admin/kriteria9/pelaksanaan', [Kriteria9AdminController::class, 'storePelaksaan'])->name('kriteria9.pelaksanaan.store');
    Route::post('/admin/kriteria9/evaluasi', [Kriteria9AdminController::class, 'storeEvaluasi'])->name('kriteria9.evaluasi.store');
    Route::post('/admin/kriteria9/pengendalian', [Kriteria9AdminController::class, 'storePengendalian'])->name('kriteria9.pengendalian.store');
    Route::post('/admin/kriteria9/peningkatan', [Kriteria9AdminController::class, 'storePeningkatan'])->name('kriteria9.peningkatan.store');

});

Route::middleware(['auth', 'authorize:KPS,KJR,KJM,DIR'])->group(function () {
    Route::get('/dashboard_validator', [ValidatorDashboardController::class, 'index'])->name('dashboard_validator');

    Route::get('/kriteria/validator/kriteria{id_kriteria}', [KriteriaValidatorController::class, 'index'])
        ->where('id_kriteria', '[1-9]')
        ->name('kriteria.index');

    Route::get('/kriteria/validator/kriteria{id_kriteria}/overview', [KriteriaValidatorController::class, 'generateOverview'])
        ->where('id_kriteria', '[1-9]')
        ->name('kriteria.overview');

    Route::get('/kriteria/validator/kriteria{id_kriteria}/stream', [KriteriaValidatorController::class, 'streamOverview'])
        ->where('id_kriteria', '[1-9]')
        ->name('kriteria.stream');

    Route::post('/validator/kriteria', [KriteriaValidatorController::class, 'validation'])->name('validator.kriteria');
});


