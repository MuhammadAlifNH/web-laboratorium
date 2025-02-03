@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Perangkat Keras</h1>
    <a href="{{ route('perkeras.create') }}" class="btn btn-primary">Tambah Perangkat Keras</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Fakultas</th>
                <th>Lab</th>
                <th>Nama</th>
                <th>Merek</th>
                <th>Tahun Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($perKeras as $item)
            <tr>
                <td>{{ $item->fakultas ? $item->fakultas->nama_fakultas : '-' }}</td>
                <td>{{ $item->lab ? $item->lab->no_ruangan : '-' }}</td>
                <td>{{ $item->nama }}</td>
                   <td>{{ $item->merek }}</td>
                <td>{{ $item->tahun_pembelian }}</td>
                <td>
                    <a href="{{ route('perkeras.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('perkeras.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus perangkat lunak ini?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data perangkat keras.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
