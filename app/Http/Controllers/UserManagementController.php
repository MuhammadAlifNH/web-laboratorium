<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('fitur.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($user->role === 'admin_pusat') {
            return redirect()->route('users.index')->with('error', 'Tidak dapat mengubah role admin_pusat.');
        }
        return view('fitur.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:pengguna,laboran,teknisi',
        ]);

        $user = User::findOrFail($id);

        if ($user->role === 'admin_pusat') {
            return redirect()->route('users.index')->with('error', 'Tidak dapat mengubah role admin_pusat.');
        }

        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Role pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

    // Cek apakah role adalah admin_pusat
        if ($user->role === 'admin_pusat') {
            return redirect()->route('users.index')
                ->with('error', 'Pengguna dengan role admin_pusat tidak dapat dihapus.');
        }

        // Hapus pengguna
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
        }
}
