<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerangkatLunak extends Model
{
    use HasFactory;

    protected $table = 'perangkat_lunak';
    
    protected $fillable = [
        'nama',
        'versi',
        'kategori',
    ];
}
