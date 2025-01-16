<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin_pusat')->get(); // Mengambil semua user kecuali admin_pusat
        return view('admin_pusat.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($user->role === 'admin_pusat') {
            return redirect()->route('admin.users.index')->with('error', 'Tidak dapat mengubah role admin pusat.');
        }
        return view('admin_pusat.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:pengguna,laboran,teknisi',
        ]);

        $user = User::findOrFail($id);

        if ($user->role === 'admin_pusat') {
            return redirect()->route('admin.users.index')->with('error', 'Tidak dapat mengubah role admin pusat.');
        }

        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Role pengguna berhasil diperbarui.');
    }
}
