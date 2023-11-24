<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProvinsiController;
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

Route::get('/admin/dashboard', [DashboardController::class, 'index']);

Route::get('/provinsi', [ProvinsiController::class, 'index'])->name('provinsi');;
Route::post('/store', [ProvinsiController::class, 'store'])->name('store');

Route::get('/create', [ProvinsiController::class, 'create'])->name('create');
Route::get('/edit/{id}', [ProvinsiController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [ProvinsiController::class, 'update'])->name('update');

Route::delete('/destroy/{id}', [ProvinsiController::class, 'destroy'])->name('destroy');
