@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Perangkat Keras</h1>
    <a href="{{ route('perkeras.create') }}" class="btn btn-primary mb-3">Tambah Perangkat Keras</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Fakultas</th>
                <th>Lab</th>
                <th>Nama</th>
                <th>Merek</th>
                <th>Tahun Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perkeras as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->fakultas->nama_fakultas }}</td>
                    <td>{{ $item->lab->nama_ruangan }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->merek }}</td>
                    <td>{{ $item->tahun_pembelian }}</td>
                    <td>
                        <a href="{{ route('perkeras.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('perkeras.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
