@extends('layouts.web')

@section('content')
<div class="container">
    <h2>Tambah Pernyataan Pemeriksaan</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemeriksa_perlunak.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pernyataan" class="form-label">Pernyataan</label>
            <input type="text" name="pernyataan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pemeriksa_perlunak.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
