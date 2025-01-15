<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminPusatDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'admin_pusat') {
            return view('dashboard.admin_pusat');
        }

        return redirect()->route('login');
    }

    public function laboranDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'laboran') {
            return view('dashboard.laboran');
        }

        return redirect()->route('login');
    }

    public function teknisiDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'teknisi') {
            return view('dashboard.teknisi');
        }

        return redirect()->route('login');
    }

    public function penggunaDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'pengguna') {
            return view('dashboard.pengguna');
        }

        return redirect()->route('login');
    }
}
