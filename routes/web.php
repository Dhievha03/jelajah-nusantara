<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProvinsiController;
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

Route::get('/provinsi', [ProvinsiController::class, 'index']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Auth
    Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
    Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::group(['middleware' => ['auth:admin']], function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
