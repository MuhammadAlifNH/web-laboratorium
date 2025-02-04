<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaPerlunak extends Model
{
    use HasFactory;

    protected $table = 'pemeriksa_perlunak';
    protected $fillable = ['pernyataan'];

}
