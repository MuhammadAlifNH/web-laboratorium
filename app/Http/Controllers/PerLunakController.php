<?php

namespace App\Http\Controllers;

use App\Models\PerLunak;
use App\Models\Fakultas;
use App\Models\Lab;
use Illuminate\Http\Request;

class PerLunakController extends Controller
{
    public function index()
    {
        $perLunak = PerLunak::with(['fakultas', 'lab'])->get();
        return view('fitur.per_lunak.index', compact('perLunak'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        $labs = Lab::all();
        return view('fitur.per_lunak.create', compact('fakultas', 'labs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fakultas_id' => 'required|exists:fakultas,id',
            'lab_id' => 'required|exists:labs,id',
            'softwares' => 'required|array|min:1',
            'softwares.*.nama' => 'required|string|max:255',
            'softwares.*.versi' => 'required|string|max:255',
        ]);

        foreach ($request->softwares as $software) {
            Perlunak::create([
                'fakultas_id' => $request->fakultas_id,
                'lab_id' => $request->lab_id,
                'nama' => $software['nama'],
                'versi' => $software['versi'],
            ]);
        }

        return redirect()->route('perlunak.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(Perlunak $perlunak)
    {
        $fakultas = Fakultas::all();
        $labs = Lab::where('fakultas_id', $perlunak->fakultas_id)->get();

        return view('fitur.per_lunak.edit', compact('perlunak', 'fakultas', 'labs'));
    }


    // Menyimpan Perubahan
    public function update(Request $request, Perlunak $perlunak)
    {
        $request->validate([
            'versi' => 'required|string|max:255',
        ]);

        $perlunak->update([
            'versi' => $request->versi,
        ]);

        return redirect()->route('perlunak.index')->with('success', 'Data berhasil diperbarui!');
    }


    public function destroy(PerLunak $perLunak)
    {
        $perLunak->delete();
        return redirect()->route('perlunak.index')->with('success', 'Perangkat lunak berhasil dihapus.');
    }
}

