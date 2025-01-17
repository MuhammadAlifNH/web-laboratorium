<?php

namespace App\Http\Controllers;

use App\Models\PerangkatLunak;
use Illuminate\Http\Request;

class PerangkatLunakController extends Controller
{
    /**
     * Menampilkan daftar perangkat lunak.
     */
    public function index()
    {
        $perangkatLunak = PerangkatLunak::all();
        return response()->json($perangkatLunak);
    }

    /**
     * Menyimpan data perangkat lunak baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'versi' => 'required|string|max:50',
            'kategori' => 'required|string|max:100',
        ]);

        $perangkatLunak = PerangkatLunak::create($validatedData);

        return response()->json([
            'message' => 'Perangkat lunak berhasil ditambahkan.',
            'data' => $perangkatLunak,
        ], 201);
    }

    /**
     * Menampilkan detail perangkat lunak tertentu.
     */
    public function show($id)
    {
        $perangkatLunak = PerangkatLunak::find($id);

        if (!$perangkatLunak) {
            return response()->json(['message' => 'Perangkat lunak tidak ditemukan.'], 404);
        }

        return response()->json($perangkatLunak);
    }

    /**
     * Memperbarui data perangkat lunak.
     */
    public function update(Request $request, $id)
    {
        $perangkatLunak = PerangkatLunak::find($id);

        if (!$perangkatLunak) {
            return response()->json(['message' => 'Perangkat lunak tidak ditemukan.'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'versi' => 'sometimes|required|string|max:50',
            'kategori' => 'sometimes|required|string|max:100',
        ]);

        $perangkatLunak->update($validatedData);

        return response()->json([
            'message' => 'Perangkat lunak berhasil diperbarui.',
            'data' => $perangkatLunak,
        ]);
    }

    /**
     * Menghapus data perangkat lunak.
     */
    public function destroy($id)
    {
        $perangkatLunak = PerangkatLunak::find($id);

        if (!$perangkatLunak) {
            return response()->json(['message' => 'Perangkat lunak tidak ditemukan.'], 404);
        }

        $perangkatLunak->delete();

        return response()->json(['message' => 'Perangkat lunak berhasil dihapus.']);
    }
}
