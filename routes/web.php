<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PerLunakController;
use App\Http\Controllers\PerKerasController;
use App\Http\Controllers\PemeriksaPerlunakController;


Route::get('/', function () {
    return view('welcome');
});

// Rute untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rute untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    // Dashboard untuk Admin Pusat
    Route::get('/dashboard/adminPusat', [DashboardController::class, 'adminPusatDashboard'])->name('admin.dashboard');

    // Dashboard untuk Laboran
    Route::get('/dashboard/laboran', [DashboardController::class, 'laboranDashboard'])->name('laboran.dashboard');

    // Dashboard untuk Teknisi
    Route::get('/dashboard/teknisi', [DashboardController::class, 'teknisiDashboard'])->name('teknisi.dashboard');

    // Dashboard untuk Pengguna
    Route::get('/dashboard/pengguna', [DashboardController::class, 'penggunaDashboard'])->name('pengguna.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/fitur/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/fitur/users/{id}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/fitur/users/{id}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/fitur/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/fitur/labs', [LabController::class, 'index'])->name('labs.index');
    Route::get('/fitur/labs/create', [LabController::class, 'create'])->name('labs.create');
    Route::post('/fitur/labs', [LabController::class, 'store'])->name('labs.store');
    Route::get('/fitur/labs/{lab}/edit', [LabController::class, 'edit'])->name('labs.edit');
    Route::put('/fitur/labs/{lab}', [LabController::class, 'update'])->name('labs.update');
    Route::delete('/fitur/labs/{lab}', [LabController::class, 'destroy'])->name('labs.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/fitur/fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
    Route::get('/fitur/fakultas/create', [FakultasController::class, 'create'])->name('fakultas.create');
    Route::post('/fitur/fakultas', [FakultasController::class, 'store'])->name('fakultas.store');
    Route::delete('/fitur/fakultas/{fakultas}', [FakultasController::class, 'destroy'])->name('fakultas.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/fitur/per_lunak', [PerLunakController::class, 'index'])->name('perlunak.index');
    Route::get('/fitur/per_lunak/create', [PerLunakController::class, 'create'])->name('perlunak.create');
    Route::post('/fitur/per_lunak', [PerLunakController::class, 'store'])->name('perlunak.store');
    Route::get('/perlunak/{perlunak}/edit', [PerlunakController::class, 'edit'])->name('perlunak.edit');
    Route::put('/perlunak/{perlunak}', [PerlunakController::class, 'update'])->name('perlunak.update'); 
    Route::delete('/fitur/per_lunak/{perLunak}', [PerLunakController::class, 'destroy'])->name('perlunak.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/fitur/per_keras', [PerKerasController::class, 'index'])->name('perkeras.index');
    Route::get('/fitur/per_keras/create', [PerKerasController::class, 'create'])->name('perkeras.create');
    Route::post('/fitur/per_keras', [PerKerasController::class, 'store'])->name('perkeras.store');
    Route::get('/perkeras/{perkeras}/edit', [PerKerasController::class, 'edit'])->name('perkeras.edit');
    Route::put('/perkeras/{perkeras}', [PerKerasController::class, 'update'])->name('perkeras.update');
    Route::delete('/fitur/per_keras/{perKeras}', [PerKerasController::class, 'destroy'])->name('perkeras.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/fitur/pemeriksa_perlunak', [PemeriksaPerlunakController::class, 'index'])->name('pemeriksa_perlunak.index');
    Route::get('/fitur/pemeriksa_perlunak/create', [PemeriksaPerlunakController::class, 'create'])->name('pemeriksa_perlunak.create');
    Route::post('/fitur/pemeriksa_perlunak', [PemeriksaPerlunakController::class, 'store'])->name('pemeriksa_perlunak.store');
    Route::delete('/fitur/pemeriksa_perlunak/{fakultas}', [PemeriksaPerlunakController::class, 'destroy'])->name('pemeriksa_perlunak.destroy');
});

Route::get('/get-labs/{fakultasId}', [LabController::class, 'getLabs']);
