<?php

namespace App\Models;

use App\Models\Tani;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ternak extends Model
{
    use HasFactory;
    public $table = "ternak";
    protected $fillable = [
        'name',
        'hewan',
        'jenis',
        'kelamin',
        'lahir',
        'umur',
        'mati',
        'hasil',
        'user',
    ];

    public static function boot()
    {
        parent::boot();

        // Event `saving` dipanggil ketika model disimpan ke database
        static::saving(function ($model) {
           $lahir = Carbon::parse($model->lahir);
           $sekarang = Carbon::now();
           $umur = $lahir->diffInDays($sekarang);
          
        });
    }

    public function updateAllUmur()
    {
        $tanggal = Carbon::now();
        Ternak::chunk(100, function ($ternak) use ($tanggal) {
            foreach ($ternak as $ternaks) {
                $umur_hari = $this->hitungUmurHari($ternaks->ditanam, $tanggal);
                $ternaks->umur = $umur_hari;
                $ternaks->save();
            }
        });
    }

    public function hitungUmurHari($ditanam, $tanggal)
    {
        $diff = Carbon::parse($ditanam)->diffInDays(Carbon::parse($tanggal));
        return $diff;
    }
}
