<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::get('/' , function () {
        return view('pages.welcome');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->middleware('guest')->name('login');
        Route::post('/login/auth', 'auth')->middleware('guest')->name('auth');
    });
});

Route::middleware('auth')->group(function () {
    
    Route::get('/user/profile' ,  [UserController::class , 'index'])->name('profile');
    Route::get('/user/profile/edit' ,  [UserController::class , 'edit'])->name('profile-edit');
    Route::patch('/user/profile/update/{user}' ,  [UserController::class , 'update'])->name('profile-update');

    Route::get('/preview/{surat}', Controller::class)->name('preview');
    Route::get('/preview/{surat}/laporan', [Controller::class, 'laporan'])->name('preview-laporan');
    Route::get('/preview/{surat}/disposisi', [Controller::class, 'disposisi'])->name('disposisi');

    Route::post('/logout' , [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard',[AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/laporan', [SuratController::class, 'index'])->name('laporan');
    Route::get('/surat-masuks', [SuratMasukController::class, 'index'])->name('surat-masuk');
    Route::get('/surat-keluars', [SuratKeluarController::class, 'index'])->name('surat-keluar');

    Route::middleware('can:create')->group(function () {
        Route::get('/surat-masuk/create', [SuratMasukController::class, 'create'])->name('sm-create');
        Route::get('/surat-keluar/create', [SuratKeluarController::class, 'create'])->name('sk-create');
    });

    Route::middleware('can:store')->group(function () {
        Route::post('/surat-masuk/store', [SuratMasukController::class, 'store'])->name('sm-store');
        Route::post('/surat-keluar/store', [SuratKeluarController::class, 'store'])->name('sk-store');
    });
    
    Route::middleware('can:update')->group(function () {
        Route::get('/surat-keluars/{surat}/edit', [SuratKeluarController::class,'edit'])->name('sk-edit');
        Route::patch('/surat-keluars/{surat}/update', [SuratKeluarController::class, 'update'])->name('sk-update');
    });
    
    Route::middleware('can:delete')->group(function () {
        Route::delete('/surat-masuk/{surat}/delete', [SuratMasukController::class, 'destroy'])->name('sm-delete');
        Route::delete('/surat-keluar/{surat}/delete', [SuratKeluarController::class, 'destroy'])->name('sk-delete');
    });

});