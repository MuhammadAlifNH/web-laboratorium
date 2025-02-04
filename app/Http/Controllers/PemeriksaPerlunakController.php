<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemeriksaPerlunak;

class PemeriksaPerlunakController extends Controller
{
    public function index()
    {
        $data = PemeriksaPerlunak::all();
        return view('fitur.pemeriksa_perlunak.index', compact('data'));
    }

    public function create()
    {
        return view('fitur.pemeriksa_perlunak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pernyataan' => 'required|string|max:255',
        ]);

        PemeriksaPerlunak::create($request->all());

        return redirect()->route('pemeriksa_perlunak.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        PemeriksaPerlunak::findOrFail($id)->delete();
        return redirect()->route('pemeriksa_perlunak.index')->with('success', 'Data berhasil dihapus.');
    }
}
