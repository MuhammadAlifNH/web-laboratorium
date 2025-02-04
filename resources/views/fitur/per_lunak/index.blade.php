@extends('layouts.web')

@section('content')
<div class="container">
    <h1>Daftar Perangkat Lunak</h1>
    <a href="{{ route('perlunak.create') }}" class="btn btn-primary">Tambah Perangkat Lunak</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Fakultas</th>
                <th>Nomor Ruangan</th>
                <th>Nama Perangkat Lunak</th>
                <th>Versi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($perLunak as $item)
            <tr>
                <td>{{ $item->fakultas ? $item->fakultas->nama_fakultas : '-' }}</td>
                <td>{{ $item->lab ? $item->lab->no_ruangan : '-' }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->versi }}</td>
                <td>
                    <a href="{{ route('perlunak.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('perlunak.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus perangkat lunak ' + '{{ $item->nama}} ' + '{{ $item->versi }}'+' ini?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data perangkat lunak.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
