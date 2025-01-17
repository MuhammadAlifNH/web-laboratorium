<?php

namespace App\Http\Controllers;

use App\Models\PerangkatKeras;
use Illuminate\Http\Request;

class PerangkatKerasController extends Controller
{
    /**
     * Menampilkan daftar perangkat keras.
     */
    public function index()
    {
        $perangkatKeras = PerangkatKeras::all();
        return response()->json($perangkatKeras);
    }

    /**
     * Menyimpan data perangkat keras baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'spesifikasi' => 'required|string',
            'harga' => 'required|numeric|min:0',
        ]);

        $perangkatKeras = PerangkatKeras::create($validatedData);

        return response()->json([
            'message' => 'Perangkat keras berhasil ditambahkan.',
            'data' => $perangkatKeras
        ], 201);
    }

    /**
     * Menampilkan detail perangkat keras tertentu.
     */
    public function show($id)
    {
        $perangkatKeras = PerangkatKeras::find($id);

        if (!$perangkatKeras) {
            return response()->json(['message' => 'Perangkat keras tidak ditemukan.'], 404);
        }

        return response()->json($perangkatKeras);
    }

    /**
     * Memperbarui data perangkat keras.
     */
    public function update(Request $request, $id)
    {
        $perangkatKeras = PerangkatKeras::find($id);

        if (!$perangkatKeras) {
            return response()->json(['message' => 'Perangkat keras tidak ditemukan.'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'kategori' => 'sometimes|required|string|max:255',
            'merek' => 'sometimes|required|string|max:255',
            'spesifikasi' => 'sometimes|required|string',
            'harga' => 'sometimes|required|numeric|min:0',
        ]);

        $perangkatKeras->update($validatedData);

        return response()->json([
            'message' => 'Perangkat keras berhasil diperbarui.',
            'data' => $perangkatKeras
        ]);
    }

    /**
     * Menghapus data perangkat keras.
     */
    public function destroy($id)
    {
        $perangkatKeras = PerangkatKeras::find($id);

        if (!$perangkatKeras) {
            return response()->json(['message' => 'Perangkat keras tidak ditemukan.'], 404);
        }

        $perangkatKeras->delete();

        return response()->json(['message' => 'Perangkat keras berhasil dihapus.']);
    }
}
