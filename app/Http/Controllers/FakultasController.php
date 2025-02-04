<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fitur.fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fitur.fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required|unique:fakultas'
        ]);

        Fakultas::create($request->all());
        return redirect()->route('fakultas.index');
    }

    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        return redirect()->route('fakultas.index');
    }
}
