<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grow extends Model
{
    use HasFactory;
    public $table = 'grow';
    protected $fillable = [
    	'id_betina',
        'id_jantan',
        'mulai',
        'akhir',
        'keterangan',
        'hasil',
        'status',
        'sebab',
        'user',
    ];
}
