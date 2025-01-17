<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $labs = Lab::all();
        return view('admin_pusat.labs.index', compact('labs'));
    }

    public function create()
    {
        return view('admin_pusat.labs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_ruangan' => 'required|unique:labs',
            'nama_ruangan' => 'required',
        ]);

        Lab::create($request->all());
        return redirect()->route('labs.index')->with('success', 'Lab berhasil ditambahkan.');
    }

    public function edit(Lab $lab)
    {
        return view('admin_pusat.labs.edit', compact('lab'));
    }

    public function update(Request $request, Lab $lab)
    {
        $request->validate([
            'nomor_ruangan' => 'required|unique:labs,nomor_ruangan,' . $lab->id,
            'nama_ruangan' => 'required',
        ]);

        $lab->update($request->all());
        return redirect()->route('labs.index')->with('success', 'Lab berhasil diperbarui.');
    }

    public function destroy(Lab $lab)
    {
        $lab->delete();
        return redirect()->route('labs.index')->with('success', 'Lab berhasil dihapus.');
    }
}
