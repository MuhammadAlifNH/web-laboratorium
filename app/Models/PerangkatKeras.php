<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerangkatKeras extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'perangkat_keras';

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'kategori',
        'merek',
        'spesifikasi',
        'harga',
    ];

    // Menentukan tipe data untuk kolom tertentu jika diperlukan
    protected $casts = [
        'harga' => 'decimal:2', // Pastikan harga di-cast menjadi tipe decimal dengan 2 angka di belakang koma
    ];
}
