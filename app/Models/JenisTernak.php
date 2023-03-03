<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTernak extends Model
{
    use HasFactory;
    public $table = "jenisternak";
    protected $fillable = [
        'name',
    ];
}
