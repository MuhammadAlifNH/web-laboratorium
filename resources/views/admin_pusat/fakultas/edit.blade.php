@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Fakultas</h1>
    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
            <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
