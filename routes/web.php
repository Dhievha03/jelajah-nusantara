<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\WisataApprovalController;
use App\Http\Controllers\Admin\WisataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Page\HomeController;
use App\Http\Controllers\page\TrendingController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\WisataController as UserWisataController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SavedWisataController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/trending', [TrendingController::class, 'index'])->name('trending');
Route::get('/detail/{id}', [TrendingController::class, 'show'])->name('detail');

Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
Route::post('/authenticate', [UserAuthController::class, 'authenticate'])->name('user.authenticate');

Route::get('/register', [UserAuthController::class, 'register'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'registerStore'])->name('user.register.store');

Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::group(['prefix' => 'wisata', 'as' => 'wisata.'], function () {
            Route::get('/', [UserWisataController::class, 'index'])->name('index');
            Route::get('/create', [UserWisataController::class, 'create'])->name('create');
            Route::post('/create', [UserWisataController::class, 'store'])->name('store');
            Route::get('/edit/{wisata}', [UserWisataController::class, 'edit'])->name('edit');
            Route::put('/{wisata}', [UserWisataController::class, 'update'])->name('update');
            Route::get('/detail/{wisata}/{slug}', [UserWisataController::class, 'show'])->name('show');
            Route::delete('/{wisata}', [UserWisataController::class, 'destroy'])->name('delete');
            Route::get('/get-wisatas', [UserWisataController::class, 'getWisatas'])->name('getWisatas');

            Route::get('/saved', [SavedWisataController::class, 'index'])->name('saved');
        });
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Auth
    Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::group(['middleware' => ['auth:admin']], function () {
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
