@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Lab</h1>
    <a href="{{ route('labs.create') }}" class="btn btn-primary">Tambah Lab</a>
    <table class="table mt-3">
        <thead>
            <tr>
            <th>Fakultas</th>
            <th>Nomor Ruangan</th>
            <th>Nama Ruangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($labs as $lab)
        <tr>
            <td>{{ $lab->fakultas ? $lab->fakultas->nama_fakultas : '-' }}</td>
            <td>{{ $lab->no_ruangan }}</td>
            <td>{{ $lab->nama_ruangan }}</td>
            <td>
                <a href="{{ route('labs.edit', $lab->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('labs.destroy', $lab->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lab ' + '{{ $lab->no_ruangan}}' + ' ' + '{{ $lab->fakultas ? $lab->fakultas->nama_fakultas : '-' }}' + '?')" style="display:inline;">
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
