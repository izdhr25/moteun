<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tani extends Model
{
    use HasFactory;
    public $table = "tani";
    protected $fillable = [
        'name',
        'tanaman',
        'jenis',
        'kelamin',
        'ditanam',
        'umur',
        'dipanen',
        'hasil',
        'user',
    ];

    public static function boot()
    {
        parent::boot();

        // Event `saving` dipanggil ketika model disimpan ke database
        static::saving(function ($model) {
           $ditanam = Carbon::parse($model->ditanam);
           $sekarang = Carbon::now();
           $umur = $ditanam->diffInDays($sekarang);
        });
    }

    public function updateAllUmur()
    {
        $tanggal = Carbon::now();
        Tani::chunk(100, function ($tani) use ($tanggal) {
            foreach ($tani as $tanis) {
                $umur_hari = $this->hitungUmurHari($tanis->ditanam, $tanggal);
                $tanis->umur = $umur_hari;
                $tanis->save();
            }
        });
    }

    public function hitungUmurHari($ditanam, $tanggal)
    {
        $diff = Carbon::parse($ditanam)->diffInDays(Carbon::parse($tanggal));
        return $diff;
    }
}
