<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    public $table = "obat";
    protected $fillable = [
        'nama_obat',
        'nama',
        'jenis',
        'obat',
        'dosis',
        'perawat',
        'user',
    ];
}
