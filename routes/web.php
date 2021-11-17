<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Patologi\ResumeController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Patologi\PatologiController;

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
        Route::get('alat/{id}',[AdminController::class,'detailAlat'])->name('detail.alat');
        Route::get('kegiatan',[AdminController::class,'kegiatan'])->name('kegiatan');
    });

    Route::prefix('petugas')->name('petugas.')->group(function () {
        Route::get('dashboard',[PetugasController::class,'dashboard'])->name('dashboard');
    });

    Route::prefix('patologi')->name('patologi.')->group(function () {
        Route::prefix('kimia')->name('kimia.')->group(function () {
            Route::get('maintenance',[PatologiController::class,'index'])->name('maintenance');
            Route::get('penggunaan',[PatologiController::class,'index'])->name('penggunaan');
            Route::get('pemeliharaan',[PatologiController::class,'index'])->name('pemeliharaan');
            Route::get('monitoring',[PatologiController::class,'index'])->name('monitoring');
            Route::get('{kategori}/{id}',[PatologiController::class,'detail'])->name('detail');
        });

        Route::prefix('hematologi')->name('hematologi.')->group(function () {
            Route::get('maintenance',[PatologiController::class,'index'])->name('maintenance');
            Route::get('penggunaan',[PatologiController::class,'index'])->name('penggunaan');
            Route::get('pemeliharaan',[PatologiController::class,'index'])->name('pemeliharaan');
            Route::get('monitoring',[PatologiController::class,'index'])->name('monitoring');
            Route::get('{kategori}/{id}',[PatologiController::class,'detail'])->name('detail');
        });

        Route::prefix('urinalisis')->name('urinalisis.')->group(function () {
            Route::get('maintenance',[PatologiController::class,'index'])->name('maintenance');
            Route::get('penggunaan',[PatologiController::class,'index'])->name('penggunaan');
            Route::get('pemeliharaan',[PatologiController::class,'index'])->name('pemeliharaan');
            Route::get('monitoring',[PatologiController::class,'index'])->name('monitoring');
            Route::get('{kategori}/{id}',[PatologiController::class,'detail'])->name('detail');
        });

        Route::prefix('imunoserologi')->name('imunoserologi.')->group(function () {
            Route::get('maintenance',[PatologiController::class,'index'])->name('maintenance');
            Route::get('penggunaan',[PatologiController::class,'index'])->name('penggunaan');
            Route::get('pemeliharaan',[PatologiController::class,'index'])->name('pemeliharaan');
            Route::get('monitoring',[PatologiController::class,'index'])->name('monitoring');
            Route::get('{kategori}/{id}',[PatologiController::class,'detail'])->name('detail');
        });
    });

    Route::prefix('resume')->name('resume.')->group(function () {

        Route::prefix('kimia')->name('kimia.')->group(function () {
            Route::prefix('maintenance')->name('maintenance.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewMaintenance'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakMaintenance'])->name('cetak');
            });
            Route::prefix('penggunaan')->name('penggunaan.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewPenggunaan'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakPenggunaan'])->name('cetak');
            });
            Route::prefix('pemeliharaan')->name('pemeliharaan.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewPemeliharaan'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakPemeliharaan'])->name('cetak');
            });            
            Route::prefix('monitoring')->name('monitoring.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewMonitor'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakMonitor'])->name('cetak');
            });
        });
        
        Route::prefix('hematologi')->name('hematologi.')->group(function () {
            Route::prefix('maintenance')->name('maintenance.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewMaintenance'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakMaintenance'])->name('cetak');
            });
            Route::prefix('penggunaan')->name('penggunaan.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewPenggunaan'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakPenggunaan'])->name('cetak');
            });
            Route::prefix('pemeliharaan')->name('pemeliharaan.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewPemeliharaan'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakPemeliharaan'])->name('cetak');
            });
            Route::prefix('monitoring')->name('monitoring.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewMonitor'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakMonitor'])->name('cetak');
            });
        });
        
        Route::prefix('urinalisis')->name('urinalisis.')->group(function () {
            Route::prefix('maintenance')->name('maintenance.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewMaintenance'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakMaintenance'])->name('cetak');
            });
            Route::prefix('penggunaan')->name('penggunaan.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewPenggunaan'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakPenggunaan'])->name('cetak');
            });
            Route::prefix('pemeliharaan')->name('pemeliharaan.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewPemeliharaan'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakPemeliharaan'])->name('cetak');
            });
            Route::prefix('monitoring')->name('monitoring.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewMonitor'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakMonitor'])->name('cetak');
            });
        });
        
        Route::prefix('imunoserologi')->name('imunoserologi.')->group(function () {
            Route::prefix('maintenance')->name('maintenance.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewMaintenance'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakMaintenance'])->name('cetak');
            });
            Route::prefix('penggunaan')->name('penggunaan.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewPenggunaan'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakPenggunaan'])->name('cetak');
            });
            Route::prefix('pemeliharaan')->name('pemeliharaan.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewPemeliharaan'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakPemeliharaan'])->name('cetak');
            });
            Route::prefix('monitoring')->name('monitoring.')->group(function () {
                Route::get('/',[ResumeController::class,'daftarAlat'])->name('index');
                Route::get('{id}',[ResumeController::class,'reviewMonitor'])->name('review');
                Route::get('{id}/cetak',[ResumeController::class,'cetakMonitor'])->name('cetak');
            });
        });
    });
});
