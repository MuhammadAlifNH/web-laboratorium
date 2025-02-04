@extends('layouts.web')

@section('content')
<div class="container">
    <h1>Tambah Perangkat Lunak</h1>
    <a href="{{ route('perlunak.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($fakultas->isEmpty())
        <div class="alert alert-warning">Tidak Ada Fakultas. Anda tidak dapat menambahkan perangkat lunak.</div>
    @else
        <form action="{{ route('perlunak.store') }}" method="POST">
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

            <!-- Pilihan Lab -->
            <div class="mb-3">
                <label for="lab_id" class="form-label">Pilih Lab</label>
                <select class="form-control" id="lab_id" name="lab_id" disabled required>
                    <option value="">-- Pilih Lab --</option>
                </select>
            </div>

            <!-- Area Dinamis untuk Input Perangkat Lunak -->
            <div id="software-container">
                <div class="software-entry">
                    <div class="mb-3">
                        <label for="nama_software" class="form-label">Nama Perangkat Lunak</label>
                        <input type="text" class="form-control" name="softwares[0][nama]" required>
                    </div>
                    <div class="mb-3">
                        <label for="versi_software" class="form-label">Versi</label>
                        <input type="text" class="form-control" name="softwares[0][versi]" required>
                    </div>
                </div>
            </div>

            <!-- Tombol Tambah & Hapus -->
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-info" id="add-software">+ Tambah Perangkat Lunak</button>
                <button type="button" class="btn btn-danger" id="remove-software">Batal</button>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let maxSoftwares = 5;
        let softwareIndex = 1;

        const fakultasSelect = document.getElementById('fakultas_id');
        const labSelect = document.getElementById('lab_id');
        const addSoftwareButton = document.getElementById("add-software");
        const removeSoftwareButton = document.getElementById("remove-software");
        const softwareContainer = document.getElementById("software-container");

        // Handle Fakultas and Lab Dynamic Relationship
        fakultasSelect.addEventListener('change', function () {
            const fakultasId = this.value;
            labSelect.innerHTML = '<option value="">-- Pilih Lab --</option>';
            labSelect.disabled = true;

            if (fakultasId) {
                fetch(`{{ url('/get-labs') }}/${fakultasId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            data.forEach(lab => {
                                const option = document.createElement('option');
                                option.value = lab.id;
                                option.textContent = `${lab.no_ruangan} - ${lab.nama_ruangan}`;
                                labSelect.appendChild(option);
                            });
                            labSelect.disabled = false;
                        }
                    });
            }
        });

        // Handle Add Software Input Fields
        addSoftwareButton.addEventListener("click", function() {
            if (softwareIndex < maxSoftwares) {
                let newSoftware = document.createElement("div");
                newSoftware.classList.add("software-entry");
                newSoftware.innerHTML = `
                    <div class="mb-3">
                        <label for="nama_software" class="form-label">Nama Perangkat Lunak</label>
                        <input type="text" class="form-control" name="softwares[${softwareIndex}][nama]" required>
                    </div>
                    <div class="mb-3">
                        <label for="versi_software" class="form-label">Versi</label>
                        <input type="text" class="form-control" name="softwares[${softwareIndex}][versi]" required>
                    </div>
                `;
                softwareContainer.appendChild(newSoftware);
                softwareIndex++;
            } else {
                alert("Maksimal 5 perangkat lunak yang bisa ditambahkan!");
            }
        });

        // Handle Remove Last Software Input
        removeSoftwareButton.addEventListener("click", function() {
            let softwareEntries = document.querySelectorAll(".software-entry");
            if (softwareEntries.length > 1) {
                softwareContainer.removeChild(softwareEntries[softwareEntries.length - 1]);
                softwareIndex--;
            } else {
                alert("Minimal harus ada 1 perangkat lunak!");
            }
        });
    });
</script>

@endsection
