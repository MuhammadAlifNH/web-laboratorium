@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Perangkat Lunak</h1>
    <a href="{{ route('perlunak.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('perlunak.update', $perlunak->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fakultas_id" class="form-label">Fakultas</label>
            <div class="form-control-plaintext">
                @foreach ($fakultas as $fak)
                    @if ($fak->id == $perlunak->fakultas_id)
                        {{ $fak->nama_fakultas }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label for="lab_id" class="form-label">Lab</label>
            <div class="form-control-plaintext">
                @foreach ($labs as $item)
                    @if ($item->id == $perlunak->lab_id)
                        {{ $item->nama_ruangan }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $perlunak->nama }}" readonly>
        </div>
        <div class="form-group">
            <label for="versi">Versi</label>
            <input type="text" name="versi" id="versi" class="form-control" value="{{ $perlunak->versi }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
