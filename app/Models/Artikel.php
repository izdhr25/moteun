<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    public $table = "artikel";
    protected $fillable = [
        'judul',
        'tgl_tulis',
        'penulis',
        'deskripsi',
        'image',
        'user',
    ];
}
