<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTani extends Model
{
    use HasFactory;
    public $table = "jenistani";
    protected $fillable = [
        'name',
    ];
}
