@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Perangkat Lunak</h1>
    <form action="{{ route('perlunak.update', $perLunak->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fakultas_id">Fakultas</label>
            <select name="fakultas_id" id="fakultas_id" class="form-control">
                @foreach ($fakultas as $fak)
                    <option value="{{ $fak->id }}" {{ $perLunak->fakultas_id == $fak->id ? 'selected' : '' }}>{{ $fak->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="lab_id">Lab</label>
            <select name="lab_id" id="lab_id" class="form-control">
                @foreach ($labs as $lab)
                    <option value="{{ $lab->id }}" {{ $perLunak->lab_id == $lab->id ? 'selected' : '' }}>{{ $lab->nama_ruangan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $perLunak->nama }}" required>
        </div>
        <div class="form-group mt-2">
            <label for="merek">Merek</label>
            <input type="text" name="merek" id="merek" class="form-control" value="{{ $perKeras->merek ?? '' }}" required>
        </div>
        <div class="form-group mt-2">
            <label for="tahun_pembelian">Tahun Pembelian</label>
            <input type="number" name="tahun_pembelian" id="tahun_pembelian" class="form-control" value="{{ $perKeras->tahun_pembelian ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
