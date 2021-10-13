<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Petugas\PetugasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomepageController::class,'index'])->name('home');
Route::get('about',[HomepageController::class,'about'])->name('about');
Route::get('auth',[HomepageController::class,'auth'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('verify.login');
Route::post('register',[AuthController::class,'registrasi'])->name('register');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('personil',[AdminController::class,'personil'])->name('personil');
        Route::get('alat',[AdminController::class,'alat'])->name('alat');
        Route::get('kegiatan',[AdminController::class,'kegiatan'])->name('kegiatan');
    });

    Route::prefix('petugas')->name('petugas.')->group(function () {
        Route::get('dashboard',[PetugasController::class,'dashboard'])->name('dashboard');
    });
});
