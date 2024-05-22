<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
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

Route::get('/', function () {
    return view('homepage');
});

// route pelanggan
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth'); 

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/pelanggan', [PelangganController::class, 'index']); //untuk menampilkan seluruh data
    Route::get('/tambahpelanggan', [PelangganController::class,'tambahpelanggan']); //untuk menampilkan tambah data
    Route::post('/pelanggan', [PelangganController::class, 'pelanggan']); //untuk menyimpan data
    Route::get('/pelanggan/{pelanggan_id}', [PelangganController::class, 'show']);
    Route::get('/pelanggan/{pelanggan_id}/edit', [PelangganController::class, 'edit']);
    Route::put('/pelanggan/{pelanggan_id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/{pelanggan_id}', [PelangganController::class, 'destroy']);
    Route::get('/search', [PelangganController::class, 'search'])->name('search');
});

//untuk menampilkan seluruh data



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginform'])->name('login');
