<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    use HasFactory;
    public $table = 'metode';
    protected $fillable = [
    	'id_tanaman',
      	'id_pasangan',
     	'mulai',
     	'akhir',
     	'keterangan',
      	'hasil',
     	'status',
     	'sebab',
     	'user',
    ];

}
