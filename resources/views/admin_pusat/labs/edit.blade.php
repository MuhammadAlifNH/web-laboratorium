@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Lab</h1>
    <a href="{{ route('labs.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('labs.update', $lab) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nomor_ruangan" class="form-label">Nomor Ruangan</label>
            <input type="text" name="nomor_ruangan" value="{{ $lab->nomor_ruangan }}" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
            <input type="text" name="nama_ruangan" value="{{ $lab->nama_ruangan }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
