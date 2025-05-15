<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaAdminController;
use App\Http\Controllers\KriteriaValidatorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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

Route::get('/', [WelcomeController::class,'index']);
Route::get('/login', [AuthController::class, 'login'])->name('login'); 
Route::post('/login', [AuthController::class, 'postlogin'])->name('login.post'); 
Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');
Route::get('/kriteria_admin', [KriteriaAdminController::class,'index']);
Route::get('/kriteria_validator', [KriteriaValidatorController::class,'index']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // masukkan semua route yang perlu autentikasi di sini
});
