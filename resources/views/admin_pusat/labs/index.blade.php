@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Lab</h1>
    <a href="{{ route('labs.create') }}" class="btn btn-primary">Tambah Lab</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nomor Ruangan</th>
                <th>Nama Ruangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($labs as $lab)
            <tr>
                <td>{{ $lab->nomor_ruangan }}</td>
                <td>{{ $lab->nama_ruangan }}</td>
                <td>
                    <a href="{{ route('labs.edit', $lab) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('labs.destroy', $lab) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ruangan ' + '{{ $lab->nomor_ruangan }}' + '?')" style="display:inline;">
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
