@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Lab</h1>
    <form action="{{ route('labs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nomor_ruangan" class="form-label">Nomor Ruangan</label>
            <input type="text" name="nomor_ruangan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
            <input type="text" name="nama_ruangan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
