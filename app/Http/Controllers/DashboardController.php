<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminPusatDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'admin_pusat') {
            return view('dashboard.adminPusat', [
                'title' => 'Admin Pusat Dashboard',
                'navbarTitle' => 'Admin Pusat',
                'homeRoute' => route('admin.dashboard'),
            ]);
        }

        return redirect()->route('login');
    }

    public function laboranDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'laboran') {
            return view('dashboard.laboran', [
                'title' => 'Laboran Dashboard',
                'navbarTitle' => 'Laboran',
                'homeRoute' => route('laboran.dashboard')
            ]);
        }

        return redirect()->route('login');
    }

    public function teknisiDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'teknisi') {
            return view('dashboard.teknisi', [
                'title' => 'Teknisi Dashboard',
                'navbarTitle' => 'Teknisi',
                'homeRoute' => route('teknisi.dashboard')
            ]);
        }

        return redirect()->route('login');
    }

    public function penggunaDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'pengguna') {
            return view('dashboard.pengguna', [
                'title' => 'Pengguna Dashboard',
                'navbarTitle' => 'Pengguna',
                'homeRoute' => route('pengguna.dashboard')
            ]);
        }

        return redirect()->route('login');
    }
}
