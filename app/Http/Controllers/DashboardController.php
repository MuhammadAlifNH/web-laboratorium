<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminPusatDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'admin_pusat') {
            return view('admin_pusat.dashboard');
        }

        return redirect()->route('login');
    }

    public function laboranDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'laboran') {
            return view('laboran.dashboard');
        }

        return redirect()->route('login');
    }

    public function teknisiDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'teknisi') {
            return view('teknisi.dashboard');
        }

        return redirect()->route('login');
    }

    public function penggunaDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'pengguna') {
            return view('pengguna.dashboard');
        }

        return redirect()->route('login');
    }
}
