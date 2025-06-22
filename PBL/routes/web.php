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
use App\Http\Controllers\UserConfigController;
use App\Http\Controllers\ValidatorDashboardController;
use App\Http\Controllers\PageConfigController;

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['authorize:ADM'])->group(function () {
        Route::get('/dashboard_admin', [AdminDashboardController::class, 'index'])->name('dashboard_admin');
        Route::get('/finalisasi/stream', [FinalisasiDocumentController::class, 'streamAllKriteria'])->name('finalisasi.stream');
        Route::get('/finalisasi/download', [FinalisasiDocumentController::class, 'downloadAllKriteria'])->name('finalisasi.download');
        Route::get('/kriteria/admin/kriteria1/create', [KriteriaAdminController::class, 'create'])->name('kriteria.admin.kriteria1');
        Route::get('/kriteria/admin/kriteria1', [KriteriaAdminController::class, 'index'])->name('index.admin.kriteria1');
        Route::get('/kriteria/admin/kriteria1/edit/{id}', [KriteriaAdminController::class, 'edit'])->name('kriteria1.edit');
        Route::put('/kriteria/admin/kriteria1/update/{id}', [KriteriaAdminController::class, 'update'])->name('kriteria1.update');
        Route::post('/kriteria1/submit', [KriteriaAdminController::class, 'submitKriteria'])->name('kriteria1.submit');
        Route::get('/kriteria/admin/kriteria1/view/{id}', [KriteriaAdminController::class, 'show'])->name('kriteria1.show');
        Route::get('/kriteria/admin/kriteria1/print/{id}', [KriteriaAdminController::class, 'print']);
        Route::delete('/kriteria/admin/kriteria1/delete/{id}', [KriteriaAdminController::class, 'destroy'])->name('kriteria1.delete');
        // [Other kriteria routes remain unchanged]
    });

    Route::middleware(['authorize:KPS,KJR,KJM,DIR'])->group(function () {
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

    Route::middleware(['authorize:SP'])->group(function () {
        Route::get('/superAdmin', [SuperAdminController::class, 'index'])->name('superAdmin.dashboard');
        Route::get('/superAdmin/user', [UserConfigController::class, 'index'])->name('superAdmin.user.index');
        Route::get('/superAdmin/view_user/{id}', [UserConfigController::class, 'view'])->name('superAdmin.user.view');
        Route::get('/superAdmin/edit_user/{id}', [UserConfigController::class, 'edit'])->name('superAdmin.user.edit');
        Route::put('/superAdmin/update/{id}', [UserConfigController::class, 'update'])->name('superAdmin.user.update');
        Route::delete('/superAdmin/delete_user/{id}', [UserConfigController::class, 'destroy'])->name('superAdmin.user.delete');
        Route::get('/superAdmin/create_user', [UserConfigController::class, 'create'])->name('superAdmin.user.create');
        Route::post('/superAdmin/store_user', [UserConfigController::class, 'store'])->name('superAdmin.user.store');
        Route::post('/superadmin/user/update-hak-akses/{id}', [UserConfigController::class, 'updateHakAkses'])->name('superAdmin.user.updateHakAkses');
        Route::get('/superAdmin/kriteria', [KriteriaConfigController::class, 'index'])->name('superAdmin.kriteria.index');
        Route::get('/superAdmin/view_kriteria/{id}', [KriteriaConfigController::class, 'view'])->name('superAdmin.kriteria.view');
        Route::get('/superAdmin/edit_kriteria/{id}', [KriteriaConfigController::class, 'edit'])->name('superAdmin.kriteria.edit');
        Route::put('/superAdmin/update_kriteria/{id}', [KriteriaConfigController::class, 'update'])->name('superAdmin.kriteria.update');
        Route::delete('/superAdmin/delete_kriteria/{id}', [KriteriaConfigController::class, 'destroy'])->name('superAdmin.kriteria.delete');

        Route::prefix('superAdmin/page-config')->name('superAdmin.page.')->group(function () {
            Route::get('/', [PageConfigController::class, 'index'])->name('index');
            Route::get('/{id}/{tab}/view', [PageConfigController::class, 'view'])->name('view.tab');
            Route::get('/{id}/{tab}/edit', [PageConfigController::class, 'edit'])->name('edit.tab');
            Route::put('/{id}/{tab}/update', [PageConfigController::class, 'update'])->name('update');
           
        });
    });
});