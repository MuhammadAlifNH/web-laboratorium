@extends('layouts.web')

@section('content')
<div class="container"></div>    
    <h1>Tambah Fakultas</h1>
    <a href="{{ route('fakultas.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('fakultas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
            <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="{{ old('nama_fakultas') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection