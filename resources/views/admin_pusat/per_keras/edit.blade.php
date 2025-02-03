@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Perangkat Keras</h1>
    <a href="{{ route('perkeras.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('perkeras.update', $perkeras->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fakultas_id" class="form-label">Fakultas</label>
            <div class="form-control-plaintext">
                @foreach ($fakultas as $fak)
                    @if ($fak->id == $perkeras->fakultas_id)
                        {{ $fak->nama_fakultas }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label for="lab_id" class="form-label">Lab</label>
            <div class="form-control-plaintext">
                @foreach ($labs as $item)
                    @if ($item->id == $perkeras->lab_id)
                        {{ $item->nama_ruangan }}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="nama">Nama Perangkat Keras</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $perkeras->nama }}" readonly>
        </div>
        <div class="form-group">
            <label for="merek">Merek</label>
            <input type="text" name="merek" id="merek" class="form-control" value="{{ $perkeras->merek }}" required>
        </div>
        <div class="form-group">
            <label for="tahun_pembelian">Tahun Pembelian</label>
            <input type="text" name="tahun_pembelian" id="tahun_pembelian" class="form-control" value="{{ $perkeras->tahun_pembelian }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
