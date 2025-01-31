@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Lab</h1>
    <a href="{{ route('labs.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($fakultas->isEmpty())
        <div class="alert alert-warning">Tidak Ada Fakultas. Anda tidak dapat menambahkan lab.</div>
    @else
        <form action="{{ route('labs.store') }}" method="POST">
            @csrf

            <!-- Pilihan Fakultas -->
            <div class="mb-3">
                <label for="fakultas_id" class="form-label">Pilih Fakultas</label>
                <select class="form-control" id="fakultas_id" name="fakultas_id" required>
                    <option value="">-- Pilih Fakultas --</option>
                    @foreach ($fakultas as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_fakultas }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Area Dinamis untuk Input Lab -->
            <div id="lab-container">
                <div class="lab-entry">
                    <div class="mb-3">
                        <label for="nomor_ruangan" class="form-label">Nomor Ruangan</label>
                        <input type="text" class="form-control" name="labs[0][nomor_ruangan]" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control" name="labs[0][nama_ruangan]" required>
                    </div>
                </div>
            </div>

            <!-- Tombol Tambah & Hapus -->
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-info" id="add-lab">+ Tambah Lab</button>
                <button type="button" class="btn btn-danger" id="remove-lab">Batal</button>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let maxLabs = 5;
        let labIndex = 1;

        const addLabButton = document.getElementById("add-lab");
        const removeLabButton = document.getElementById("remove-lab");
        const labContainer = document.getElementById("lab-container");

        addLabButton.addEventListener("click", function() {
            if (labIndex < maxLabs) {
                let newLab = document.createElement("div");
                newLab.classList.add("lab-entry");
                newLab.innerHTML = `
                    <div class="mb-3">
                        <label for="nomor_ruangan" class="form-label">Nomor Ruangan</label>
                        <input type="text" class="form-control" name="labs[${labIndex}][nomor_ruangan]" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                        <input type="text" class="form-control" name="labs[${labIndex}][nama_ruangan]" required>
                    </div>
                `;
                labContainer.appendChild(newLab);
                labIndex++;
            } else {
                alert("Maksimal 5 lab yang bisa ditambahkan!");
            }
        });

        removeLabButton.addEventListener("click", function() {
            let labEntries = document.querySelectorAll(".lab-entry");
            if (labEntries.length > 1) {
                labContainer.removeChild(labEntries[labEntries.length - 1]);
                labIndex--;
            } else {
                alert("Minimal harus ada 1 lab!");
            }
        });
    });
</script>

@endsection
