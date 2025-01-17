<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LabController;



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