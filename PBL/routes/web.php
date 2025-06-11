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
use App\Http\Controllers\FinalisasiDocumentController;
use App\Http\Controllers\KriteriaConfigController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\userConfigController;
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

    // Finalisasi Dokumen untuk semua admin
    Route::get('/finalisasi/stream', [FinalisasiDocumentController::class, 'streamAllKriteria'])->name('finalisasi.stream');
    Route::get('/finalisasi/download', [FinalisasiDocumentController::class, 'downloadAllKriteria'])->name('finalisasi.download');

    // Kriteria 1
    Route::get('/kriteria/admin/kriteria1/create', [KriteriaAdminController::class, 'create'])->name('kriteria.admin.kriteria1');
    Route::get('/kriteria/admin/kriteria1/', [KriteriaAdminController::class, 'index'])->name('index.admin.kriteria1');
    Route::get('/kriteria/admin/kriteria1/edit/{id}', [KriteriaAdminController::class, 'edit'])->name('kriteria1.edit');
    Route::put('/kriteria/admin/kriteria1/update/{id}', [KriteriaAdminController::class, 'update'])->name('kriteria1.update');
    Route::post('/kriteria1/submit', [KriteriaAdminController::class, 'submitKriteria'])->name('kriteria1.submit');
    Route::get('/kriteria/admin/kriteria1/view/{id}', [KriteriaAdminController::class, 'show'])->name('kriteria1.show');
    Route::get('/kriteria/admin/kriteria1/print/{id}', [KriteriaAdminController::class, 'print']);

    // Kriteria 2
    Route::get('/kriteria/admin/kriteria2/create', [Kriteria2AdminController::class, 'create'])->name('kriteria.admin.kriteria2');
    Route::get('/kriteria/admin/kriteria2/', [Kriteria2AdminController::class, 'index'])->name('index.admin.kriteria2');
    Route::get('/kriteria/admin/kriteria2/edit/{id}', [Kriteria2AdminController::class, 'edit'])->name('kriteria2.edit');
    Route::put('/kriteria/admin/kriteria2/update/{id}', [Kriteria2AdminController::class, 'update'])->name('kriteria2.update');
    Route::post('/kriteria2/submit', [Kriteria2AdminController::class, 'submitKriteria'])->name('kriteria2.submit');
    Route::get('/kriteria/admin/kriteria2/view/{id}', [Kriteria2AdminController::class, 'show'])->name('kriteria2.show');
    Route::get('/kriteria/admin/kriteria2/print/{id}', [Kriteria2AdminController::class, 'print']);

    // Kriteria 3
    Route::get('/kriteria/admin/kriteria3/create', [Kriteria3AdminController::class, 'create'])->name('kriteria.admin.kriteria3');
    Route::get('/kriteria/admin/kriteria3/', [Kriteria3AdminController::class, 'index'])->name('index.admin.kriteria3');
    Route::get('/kriteria/admin/kriteria3/edit/{id}', [Kriteria3AdminController::class, 'edit'])->name('kriteria3.edit');
    Route::put('/kriteria/admin/kriteria3/update/{id}', [Kriteria3AdminController::class, 'update'])->name('kriteria3.update');
    Route::post('/kriteria3/submit', [Kriteria3AdminController::class, 'submitKriteria'])->name('kriteria3.submit');
    Route::get('/kriteria/admin/kriteria3/view/{id}', [Kriteria3AdminController::class, 'show'])->name('kriteria3.show');
    Route::get('/kriteria/admin/kriteria3/print/{id}', [Kriteria3AdminController::class, 'print']);
    Route::delete('/kriteria/admin/kriteria3/delete/{id}', [Kriteria3AdminController::class, 'destroy'])->name('kriteria3.delete');

    // Kriteria 4
    Route::get('/kriteria/admin/kriteria4/create', [Kriteria4AdminController::class, 'create'])->name('kriteria.admin.kriteria4');
    Route::get('/kriteria/admin/kriteria4/', [Kriteria4AdminController::class, 'index'])->name('index.admin.kriteria4');
    Route::get('/kriteria/admin/kriteria4/edit/{id}', [Kriteria4AdminController::class, 'edit'])->name('kriteria4.edit');
    Route::put('/kriteria/admin/kriteria4/update/{id}', [Kriteria4AdminController::class, 'update'])->name('kriteria4.update');
    Route::post('/kriteria4/submit', [Kriteria4AdminController::class, 'submitKriteria'])->name('kriteria4.submit');
    Route::get('/kriteria/admin/kriteria4/view/{id}', [Kriteria4AdminController::class, 'show'])->name('kriteria4.show');
    Route::get('/kriteria/admin/kriteria4/print/{id}', [Kriteria4AdminController::class, 'print']);
    Route::delete('/kriteria/admin/kriteria4/delete/{id}', [Kriteria4AdminController::class, 'destroy'])->name('kriteria4.delete');

    // Kriteria 5
    Route::get('/kriteria/admin/kriteria5/create', [Kriteria5AdminController::class, 'create'])->name('kriteria.admin.kriteria5');
    Route::get('/kriteria/admin/kriteria5/', [Kriteria5AdminController::class, 'index'])->name('index.admin.kriteria5');
    Route::get('/kriteria/admin/kriteria5/edit/{id}', [Kriteria5AdminController::class, 'edit'])->name('kriteria5.edit');
    Route::put('/kriteria/admin/kriteria5/update/{id}', [Kriteria5AdminController::class, 'update'])->name('kriteria5.update');
    Route::post('/kriteria5/submit', [Kriteria5AdminController::class, 'submitKriteria'])->name('kriteria5.submit');
    Route::get('/kriteria/admin/kriteria5/view/{id}', [Kriteria5AdminController::class, 'show'])->name('kriteria5.show');
    Route::get('/kriteria/admin/kriteria5/print/{id}', [Kriteria5AdminController::class, 'print']);

    // Kriteria 6
    Route::get('/kriteria/admin/kriteria6/create', [Kriteria6AdminController::class, 'create'])->name('kriteria.admin.kriteria6');
    Route::get('/kriteria/admin/kriteria6/', [Kriteria6AdminController::class, 'index'])->name('index.admin.kriteria6');
    Route::get('/kriteria/admin/kriteria6/edit/{id}', [Kriteria6AdminController::class, 'edit'])->name('kriteria6.edit');
    Route::put('/kriteria/admin/kriteria6/update/{id}', [Kriteria6AdminController::class, 'update'])->name('kriteria6.update');
    Route::post('/kriteria6/submit', [Kriteria6AdminController::class, 'submitKriteria'])->name('kriteria6.submit');
    Route::get('/kriteria/admin/kriteria6/view/{id}', [Kriteria6AdminController::class, 'show'])->name('kriteria6.show');
    Route::get('/kriteria/admin/kriteria6/print/{id}', [Kriteria6AdminController::class, 'print']);

    // Kriteria 7
    Route::get('/kriteria/admin/kriteria7/create', [Kriteria7AdminController::class, 'create'])->name('kriteria.admin.kriteria7');
    Route::get('/kriteria/admin/kriteria7/', [Kriteria7AdminController::class, 'index'])->name('index.admin.kriteria7');
    Route::get('/kriteria/admin/kriteria7/edit/{id}', [Kriteria7AdminController::class, 'edit'])->name('kriteria7.edit');
    Route::put('/kriteria/admin/kriteria7/update/{id}', [Kriteria7AdminController::class, 'update'])->name('kriteria7.update');
    Route::post('/kriteria7/submit', [Kriteria7AdminController::class, 'submitKriteria'])->name('kriteria7.submit');
    Route::get('/kriteria/admin/kriteria7/view/{id}', [Kriteria7AdminController::class, 'show'])->name('kriteria7.show');
    Route::get('/kriteria/admin/kriteria7/print/{id}', [Kriteria7AdminController::class, 'print']);

    // Kriteria 8
    Route::get('/kriteria/admin/kriteria8/create', [Kriteria8AdminController::class, 'create'])->name('kriteria.admin.kriteria8');
    Route::get('/kriteria/admin/kriteria8/', [Kriteria8AdminController::class, 'index'])->name('index.admin.kriteria8');
    Route::get('/kriteria/admin/kriteria8/edit/{id}', [Kriteria8AdminController::class, 'edit'])->name('kriteria8.edit');
    Route::put('/kriteria/admin/kriteria8/update/{id}', [Kriteria8AdminController::class, 'update'])->name('kriteria8.update');
    Route::post('/kriteria8/submit', [Kriteria8AdminController::class, 'submitKriteria'])->name('kriteria8.submit');
    Route::get('/kriteria/admin/kriteria8/view/{id}', [Kriteria8AdminController::class, 'show'])->name('kriteria8.show');
    Route::get('/kriteria/admin/kriteria8/print/{id}', [Kriteria8AdminController::class, 'print']);

    // Kriteria 9
    Route::get('/kriteria/admin/kriteria9/create', [Kriteria9AdminController::class, 'create'])->name('kriteria.admin.kriteria9');
    Route::get('/kriteria/admin/kriteria9/', [Kriteria9AdminController::class, 'index'])->name('index.admin.kriteria9');
    Route::get('/kriteria/admin/kriteria9/edit/{id}', [Kriteria9AdminController::class, 'edit'])->name('kriteria9.edit');
    Route::put('/kriteria/admin/kriteria9/update/{id}', [Kriteria9AdminController::class, 'update'])->name('kriteria9.update');
    Route::post('/kriteria9/submit', [Kriteria9AdminController::class, 'submitKriteria'])->name('kriteria9.submit');
    Route::get('/kriteria/admin/kriteria9/view/{id}', [Kriteria9AdminController::class, 'show'])->name('kriteria9.show');
    Route::get('/kriteria/admin/kriteria9/print/{id}', [Kriteria9AdminController::class, 'print']);

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

Route::middleware('auth', 'authorize:SP')->group(function () {
    //Tampilan
    Route::get('/superAdmin', [SuperAdminController::class, 'index'])->name('superAdmin.dashboard');

    //user config
    Route::get('/superAdmin/user', [userConfigController::class, 'index'])->name('superAdmin.user.index');
    Route::get('/superAdmin/view_user/{id}', [userConfigController::class, 'view'])->name('superAdmin.user.view');
    Route::get('/superAdmin/edit_user/{id}', [userConfigController::class, 'edit'])->name('superAdmin.user.edit');
    Route::put('/superAdmin/update_user/{id}', [userConfigController::class, 'update'])->name('superAdmin.user.update');
    Route::delete('/superAdmin/delete_user/{id}', [userConfigController::class, 'destroy'])->name('superAdmin.user.delete');
    Route::get('/superAdmin/create_user', [userConfigController::class, 'create'])->name('superAdmin.user.create');
    Route::post('/superAdmin/store_user', [userConfigController::class, 'store'])->name('superAdmin.user.store');


    //kriteria config
    Route::get('/superAdmin/kriteria', [KriteriaConfigController::class, 'index'])->name('superAdmin.kriteria.index');
    Route::get('/superAdmin/view_kriteria/{id}', [KriteriaConfigController::class, 'view'])->name('superAdmin.kriteria.view');
    Route::get('/superAdmin/edit_kriteria/{id}', [KriteriaConfigController::class, 'edit'])->name('superAdmin.kriteria.edit');
    Route::put('/superAdmin/update_kriteria/{id}', [KriteriaConfigController::class, 'update'])->name('superAdmin.kriteria.update');
    Route::delete('/superAdmin/delete_kriteria/{id}', [KriteriaConfigController::class, 'destroy'])->name('superAdmin.kriteria.delete');
});
