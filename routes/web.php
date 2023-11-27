<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\WisataApprovalController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Auth
    Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::group(['middleware' => ['auth:admin']], function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::group(['prefix' => 'provinsi', 'as' => 'provinsi.'], function () {
            Route::get('/', [ProvinsiController::class, 'index'])->name('index');
            Route::post('/store', [ProvinsiController::class, 'store'])->name('store');
            Route::put('/update/{id}', [ProvinsiController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [ProvinsiController::class, 'destroy'])->name('delete');
        });

        Route::group(['prefix' => 'wisata', 'as' => 'wisata.'], function () {
            Route::get('/', [WisataController::class, 'index'])->name('index');
            Route::get('/create', [WisataController::class, 'create'])->name('create');
            Route::post('/create', [WisataController::class, 'store'])->name('store');
            Route::get('/edit/{wisata}', [WisataController::class, 'edit'])->name('edit');
            Route::put('/{wisata}', [WisataController::class, 'update'])->name('update');
            Route::get('/detail/{wisata}/{slug}', [WisataController::class, 'show'])->name('show');
            Route::delete('/{wisata}', [WisataController::class, 'destroy'])->name('delete');
            Route::get('/get-wisatas', [WisataController::class, 'getWisatas'])->name('getWisatas');
        });

        Route::group(['prefix' => 'wisata-approval', 'as' => 'wisata-approval.'], function () {
            Route::get('/', [WisataApprovalController::class, 'index'])->name('index');
            Route::post('/approve/{wisata}', [WisataApprovalController::class, 'approveWisata'])->name('approve');
            Route::post('/reject/{wisata}', [WisataApprovalController::class, 'rejectWisata'])->name('reject');
            Route::get('/detail/{wisata}/{slug}', [WisataApprovalController::class, 'show'])->name('show');
            Route::get('/get-wisatas', [WisataApprovalController::class, 'getWisataApproval'])->name('getWisatas');
        });
    });
});
Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/provinsi', [ProvinsiController::class, 'index'])->name('provinsi');;
Route::post('/store', [ProvinsiController::class, 'store'])->name('store');

Route::get('/create', [ProvinsiController::class, 'create'])->name('create');
Route::get('/edit/{id}', [ProvinsiController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [ProvinsiController::class, 'update'])->name('update');

Route::delete('/destroy/{id}', [ProvinsiController::class, 'destroy'])->name('destroy');
