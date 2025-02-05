<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PerLunakController;
use App\Http\Controllers\PerKerasController;



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
    Route::get('/admin_pusat/dashboard', [DashboardController::class, 'adminPusatDashboard'])->name('admin.dashboard');

    // Dashboard untuk Laboran
    Route::get('/laboran/dashboard', [DashboardController::class, 'laboranDashboard'])->name('laboran.dashboard');

    // Dashboard untuk Teknisi
    Route::get('/teknisi/dashboard', [DashboardController::class, 'teknisiDashboard'])->name('teknisi.dashboard');

    // Dashboard untuk Pengguna
    Route::get('/pengguna/dashboard', [DashboardController::class, 'penggunaDashboard'])->name('pengguna.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin_pusat/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/admin_pusat/users/{id}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/admin_pusat/users/{id}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/admin_pusat/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin_pusat/labs', [LabController::class, 'index'])->name('labs.index');
    Route::get('/admin_pusat/labs/create', [LabController::class, 'create'])->name('labs.create');
    Route::post('/admin_pusat/labs', [LabController::class, 'store'])->name('labs.store');
    Route::get('/admin_pusat/labs/{lab}/edit', [LabController::class, 'edit'])->name('labs.edit');
    Route::put('/admin_pusat/labs/{lab}', [LabController::class, 'update'])->name('labs.update');
    Route::delete('/admin_pusat/labs/{lab}', [LabController::class, 'destroy'])->name('labs.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin_pusat/fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
    Route::get('/admin_pusat/fakultas/create', [FakultasController::class, 'create'])->name('fakultas.create');
    Route::post('/admin_pusat/fakultas', [FakultasController::class, 'store'])->name('fakultas.store');
    Route::get('/admin_pusat/fakultas/{fakultas}/edit', [FakultasController::class, 'edit'])->name('fakultas.edit');
    Route::put('/admin_pusat/fakultas/{fakultas}', [FakultasController::class, 'update'])->name('fakultas.update');
    Route::delete('/admin_pusat/fakultas/{fakultas}', [FakultasController::class, 'destroy'])->name('fakultas.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin_pusat/per_lunak', [PerLunakController::class, 'index'])->name('perlunak.index');
    Route::get('/admin_pusat/per_lunak/create', [PerLunakController::class, 'create'])->name('perlunak.create');
    Route::post('/admin_pusat/per_lunak', [PerLunakController::class, 'store'])->name('perlunak.store');
    Route::get('/perlunak/{perlunak}/edit', [PerlunakController::class, 'edit'])->name('perlunak.edit');
    Route::put('/perlunak/{perlunak}', [PerlunakController::class, 'update'])->name('perlunak.update'); 
    Route::delete('/admin_pusat/per_lunak/{perLunak}', [PerLunakController::class, 'destroy'])->name('perlunak.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin_pusat/per_keras', [PerKerasController::class, 'index'])->name('perkeras.index');
    Route::get('/admin_pusat/per_keras/create', [PerKerasController::class, 'create'])->name('perkeras.create');
    Route::post('/admin_pusat/per_keras', [PerKerasController::class, 'store'])->name('perkeras.store');
    Route::get('/perkeras/{perkeras}/edit', [PerKerasController::class, 'edit'])->name('perkeras.edit');
    Route::put('/perkeras/{perkeras}', [PerKerasController::class, 'update'])->name('perkeras.update');
    Route::delete('/admin_pusat/per_keras/{perKeras}', [PerKerasController::class, 'destroy'])->name('perkeras.destroy');
});

Route::get('/get-labs/{fakultasId}', [LabController::class, 'getLabs']);

Route::get('/dashboard', function () {
    return view('dashboard'); // Pastikan file resources/views/dashboard.blade.php ada
})->name('dashboard');