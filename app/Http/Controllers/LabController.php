<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;
use App\Models\Fakultas;

class LabController extends Controller
{
    public function index()
    {
        $labs = Lab::with('fakultas')->get();
        return view('admin_pusat.labs.index', compact('labs'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view('admin_pusat.labs.create', compact('fakultas'));
    }

    public function store(Request $request)
{
    $request->validate([
        'fakultas_id' => 'required|exists:fakultas,id',
        'labs' => 'required|array|min:1|max:5',
        'labs.*.nomor_ruangan' => 'required|string|max:50',
        'labs.*.nama_ruangan' => 'required|string|max:100',
    ]);

    foreach ($request->labs as $lab) {
        Lab::create([
            'fakultas_id' => $request->fakultas_id,
            'no_ruangan' => $lab['nomor_ruangan'],
            'nama_ruangan' => $lab['nama_ruangan'],
        ]);
    }

    return redirect()->route('labs.index')->with('success', 'Lab berhasil ditambahkan.');
}


    public function edit(Lab $lab)
    {
        $fakultas = Fakultas::all();
        return view('admin_pusat.labs.edit', compact('lab', 'fakultas'));
    }

    public function update(Request $request, Lab $lab)
    {
        $request->validate([
            'fakultas_id' => 'readonly',
            'no_ruangan' => 'readonly',
            'nama_ruangan' => 'required',
        ]);

        $lab->update($request->all());
        return redirect()->route('labs.index')->with('success', 'Lab berhasil diupdate.');
    }

    public function destroy(Lab $lab)
    {
        $lab->delete();
        return redirect()->route('labs.index')->with('success', 'Lab berhasil dihapus.');
    }

    public function getLabs($fakultasId)
    {
        $labs = Lab::where('fakultas_id', $fakultasId)->get(['id', 'no_ruangan', 'nama_ruangan']);
        return response()->json($labs);
    }

}
