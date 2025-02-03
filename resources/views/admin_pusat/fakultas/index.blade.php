@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Fakultas</h1>
    <a href="{{ route('fakultas.create') }}" class="btn btn-primary">Tambah fakultas</a>
    <a href="{{ route('labs.index') }}" class="btn btn-secondary">Kembali</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($fakultas as $item)
            <tr>
                <td>{{ $item->nama_fakultas }}</td>
                <td>
                    <form action="{{ route('fakultas.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ' + '{{ $item->nama_fakultas}}' + '?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
