<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = ['fakultas_id', 'no_ruangan', 'nama_ruangan'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function perLunak()
    {
        return $this->hasMany(PerLunak::class);
    }

    public function perKeras()
    {
        return $this->hasMany(PerKeras::class);
    }
}
