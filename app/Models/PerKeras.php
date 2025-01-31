<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerKeras extends Model
{
    protected $fillable = ['fakultas_id', 'lab_id', 'nama', 'merek', 'tahun_pembelian'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
