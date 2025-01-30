<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('admin_pusat.fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('admin_pusat.fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required|unique:fakultas'
        ]);

        Fakultas::create($request->all());
        return redirect()->route('fakultas.index');
    }

    public function edit(Fakultas $fakultas)
    {
        return view('admin_pusat.fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, Fakultas $fakultas)
    {
        $request->validate([
            'nama_fakultas' => 'required|unique:fakultas'
        ]);

        $fakultas->update($request->all());
        return redirect()->route('fakultas.index');
    }

    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        return redirect()->route('fakultas.index');
    }
}
