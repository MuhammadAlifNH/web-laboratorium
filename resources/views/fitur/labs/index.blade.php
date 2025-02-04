@extends('layouts.web')

@section('content')
<div class="container">
    <h1>Daftar Lab</h1>
    <a href="{{route('fakultas.index') }}" class="btn btn-primary">Tambah Fakultas</a>
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
            @if ($labs->isEmpty() && $fakultas->isEmpty())
                <tr>
                    <td colspan="4" class="text-center text-danger">Silahkan Tambahkan Fakultas Terlebih Dahulu</td>
                </tr>
            @elseif ($labs->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Tidak Ada Data Laboratorium</td>
                </tr>
            @else
                @foreach($labs as $lab)
                    <tr>
                        <td>{{ $lab->fakultas ? $lab->fakultas->nama_fakultas : '-' }}</td>
                        <td>{{ $lab->no_ruangan }}</td>
                        <td>{{ $lab->nama_ruangan }}</td>
                        <td>
                            <a href="{{ route('labs.edit', $lab->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('labs.destroy', $lab->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lab {{ $lab->no_ruangan }} {{ $lab->fakultas ? $lab->fakultas->nama_fakultas : '-' }}?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
