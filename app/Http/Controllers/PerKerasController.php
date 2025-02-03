<?php

namespace App\Http\Controllers;

use App\Models\PerKeras;
use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Lab;

class PerKerasController extends Controller
{
    public function index()
    {
        $perKeras = PerKeras::with(['fakultas', 'lab'])->get();
        return view('admin_pusat.per_keras.index', compact('perKeras'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        $labs = Lab::all();
        return view('admin_pusat.per_keras.create', compact('fakultas', 'labs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fakultas_id' => 'required|exists:fakultas,id',
            'lab_id' => 'required|exists:labs,id',
            'hardwares' => 'required|array|min:1',
            'hardwares.*.nama' => 'required|string|max:255',
            'hardwares.*.merek' => 'required|string|max:255',
            'hardwares.*.tahun_pembelian' => 'required|integer|min:2000',
        ]);

        foreach ($request->hardwares as $hardware) {
            Perkeras::create([
                'fakultas_id' => $request->fakultas_id,
                'lab_id' => $request->lab_id,
                'nama' => $hardware['nama'],
                'merek' => $hardware['merek'],
                'tahun_pembelian' => $hardware['tahun_pembelian'],
            ]);
        }

        return redirect()->route('perkeras.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(PerKeras $perkeras)
    {
        $fakultas = Fakultas::all();
        $labs = Lab::where('fakultas_id', $perkeras->fakultas_id)->get();

        return view('admin_pusat.per_keras.edit', compact('perkeras', 'fakultas', 'labs'));
    }

    public function update(Request $request, PerKeras $perkeras)
    {
        $request->validate([
            'merek' => 'required|string|max:255',
            'tahun_pembelian' => 'required|integer|min:2000',
        ]);

        $perkeras->update([
            'merek' => $request->merek,
            'tahun_pembelian' => $request->tahun_pembelian,
        ]);
        
        return redirect()->route('perkeras.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(PerKeras $perkeras)
    {
        $perkeras->delete();
        return redirect()->route('perkeras.index')->with('success', 'Perangkat keras berhasil dihapus!');
    }
}
