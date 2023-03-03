<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;
    public $table = "tentang";
    protected $fillable = [
        'judul',
        'isi',
        'poin',
        'poin2',
        'poin3',
        'poin4',
        'poin5',
        'visi',
        'misi',
    ];
}
