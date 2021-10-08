<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
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
