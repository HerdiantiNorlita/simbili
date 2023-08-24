<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;

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

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('hapus', 'hapus');
    Route::post('cek', 'prosesCek');
    Route::get('user/beranda', 'beranda');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('logout', 'logout');
    Route::post('login', 'loginProses');
});





Route::prefix('admin')->group(function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('beranda', 'beranda');
    });


    Route::controller(KamarController::class)->group(function () {
        Route::get('kamar-1', 'index1');
        Route::post('kamar-1/bayar', 'bayar1');
        Route::post('kamar-1/user/{user}', 'update1');
        Route::get('kamar-1/bayar', 'tagih1');

        Route::get('kamar-2', 'index2');
        Route::post('kamar-2/bayar', 'bayar2');
        Route::post('kamar-2/user/{user}', 'update2');
        Route::get('kamar-2/bayar', 'tagih2');
    });

    Route::controller(RekapController::class)->group(function () {
        Route::get('rekap', 'index');
    });

    Route::controller(PengaturanController::class)->group(function () {
        Route::get('pengaturan', 'index');
        Route::post('update-password', 'gantiPassword');
    });




});





