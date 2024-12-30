<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\DashboardAturanController;
use App\Http\Controllers\DashboardGejalaController;
use App\Http\Controllers\DashboardPenyakitController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::get('/penyakit', [PenyakitController::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
Route::get('/konsultasi/questions', [KonsultasiController::class, 'questions'])->name('konsultasi.questions');
Route::get('/konsultasi/diagnosis', [KonsultasiController::class, 'diagnosis'])->name('konsultasi.diagnosis');
Route::get('/konsultasi/finish', [KonsultasiController::class, 'finish'])->name('konsultasi.finish');
Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/konsultasi/answer', [KonsultasiController::class, 'answer'])->name('konsultasi.answer');
Route::post('/konsultasi/process', [KonsultasiController::class, 'process'])->name('konsultasi.process');
Route::resource('/settingpenyakit', DashboardPenyakitController::class);
Route::resource('/settinggejala', DashboardGejalaController::class);
Route::resource('/aturan', DashboardAturanController::class);


