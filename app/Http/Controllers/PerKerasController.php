<?php

namespace App\Http\Controllers;

use App\Models\PerKeras;
use Illuminate\Http\Request;

class PerKerasController extends Controller
{
    public function index()
    {
        $perkeras = PerKeras::all();
        return view('admin_pusat.per_keras.index', compact('perkeras'));
    }

    public function create()
    {
        return view('admin_pusat.per_keras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fakultas_id' => 'required',
            'lab_id' => 'required',
            'nama' => 'required',
            'versi' => 'required'
        ]);

        PerKeras::create($request->all());
        return redirect()->route('perkeras.index');
    }

    public function edit(PerKeras $perkeras)
    {
        return view('admin_pusat.per_keras.edit', compact('perkeras'));
    }

    public function update(Request $request, PerKeras $perkeras)
    {
        $request->validate([
            'fakultas_id' => 'required',
            'lab_id' => 'required',
            'nama' => 'required',
            'versi' => 'required'
        ]);

        $perkeras->update($request->all());
        return redirect()->route('perkeras.index');
    }

    public function destroy(PerKeras $perkeras)
    {
        $perkeras->delete();
        return redirect()->route('perkeras.index');
    }
}
