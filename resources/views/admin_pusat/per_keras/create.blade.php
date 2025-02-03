@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Perangkat Keras</h1>
    <a href="{{ route('perkeras.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($fakultas->isEmpty())
        <div class="alert alert-warning">Tidak Ada Fakultas. Anda tidak dapat menambahkan perangkat keras.</div>
    @else
        <form action="{{ route('perkeras.store') }}" method="POST">
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

            <!-- Area Dinamis untuk Input Perangkat keras -->
            <div id="hardware-container">
                <div class="hardware-entry">
                    <div class="mb-3">
                        <label for="nama_hardware" class="form-label">Nama Perangkat keras</label>
                        <input type="text" class="form-control" name="hardwares[0][nama]" required>
                    </div>
                    <div class="mb-3">
                        <label for="merek_hardware" class="form-label">Merek</label>
                        <input type="text" class="form-control" name="hardwares[0][merek]" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_pembelian_hardware" class="form-label">Tahun Pembelian</label>
                        <input type="text" class="form-control" name="hardwares[0][tahun_pembelian]" required>
                    </div>
                </div>
            </div>

            <!-- Tombol Tambah & Hapus -->
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-info" id="add-hardware">+ Tambah Perangkat keras</button>
                <button type="button" class="btn btn-danger" id="remove-hardware">Batal</button>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    @endif
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    let maxhardwares = 5;
    let hardwareIndex = 1;

    const fakultasSelect = document.getElementById('fakultas_id');
    const labSelect = document.getElementById('lab_id');
    const addHardwareButton = document.getElementById("add-hardware");
    const removeHardwareButton = document.getElementById("remove-hardware");
    const hardwareContainer = document.getElementById("hardware-container");

    // Handle Fakultas and Lab Dynamic Relationship
    fakultasSelect.addEventListener('change', function () {
        const fakultasId = this.value;
        labSelect.innerHTML = '<option value="">-- Pilih Lab --</option>';
        labSelect.disabled = true;

        if (fakultasId) {
            fetch(`/get-labs/${fakultasId}`) // Perbaikan URL
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
                })
                .catch(error => console.error('Error:', error));
        }
    });

    // Handle Add Hardware Input Fields
    addHardwareButton.addEventListener("click", function() {
        if (hardwareIndex < maxhardwares) {
            let newHardware = document.createElement("div");
            newHardware.classList.add("hardware-entry");
            newHardware.innerHTML = `
                <div class="mb-3">
                    <label class="form-label">Nama Perangkat Keras</label>
                    <input type="text" class="form-control" name="hardwares[${hardwareIndex}][nama]" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Merek</label>
                    <input type="text" class="form-control" name="hardwares[${hardwareIndex}][merek]" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Pembelian</label>
                    <input type="number" class="form-control" name="hardwares[${hardwareIndex}][tahun_pembelian]" required>
                </div>
            `;
            hardwareContainer.appendChild(newHardware);
            hardwareIndex++;
        } else {
            alert("Maksimal 5 perangkat keras yang bisa ditambahkan!");
        }
    });

    // Handle Remove Last Hardware Input
    removeHardwareButton.addEventListener("click", function() {
        let hardwareEntries = document.querySelectorAll(".hardware-entry");
        if (hardwareEntries.length > 1) {
            hardwareContainer.removeChild(hardwareEntries[hardwareEntries.length - 1]);
            hardwareIndex--;
        } else {
            alert("Minimal harus ada 1 perangkat keras!");
        }
    });
});
</script>

@endsection
