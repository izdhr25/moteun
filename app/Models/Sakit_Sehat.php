<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sakit_Sehat extends Model
{
    use HasFactory;
    public $table = "sakit_sehats";
    protected $fillable = [
        'nama_id',
        'nama',
        'jenis',
        'tgl_sakit',
        'lama_sakit',
        'tgl_sembuh',
        'obat',
        'perawat',
        'status',
        'user',
    ];

    public static function boot()
    {
        parent::boot();

        // Event `saving` dipanggil ketika model disimpan ke database
        static::saving(function ($model) {
           $tgl_sakit = Carbon::parse($model->tgl_sakit);
           $sekarang = Carbon::now();
           $lama_sakit = $tgl_sakit->diffInDays($sekarang);
         
        });
    }

    public function updateAllUmur()
    {
        $tanggal = Carbon::now();
        Sakit_Sehat::chunk(100, function ($sakit_sehat) use ($tanggal) {
            foreach ($sakit_sehat as $sakit_sehats) {
                if($sakit_sehats->tgl_sembuh === null) {
                    $umur_hari = $this->hitungUmurHari($sakit_sehats->tgl_sakit, $tanggal);
                    $sakit_sehats->lama_sakit = $umur_hari;
                    $sakit_sehats->save();
                } else {
                    $umur_hari = $this->hitungUmurHari($sakit_sehats->tgl_sakit, $tgl_sembuh);
                    $sakit_sehats->lama_sakit = $umur_hari;
                    $sakit_sehats->save();
                }
            }
        });
    }

    public function hitungUmurHari($tgl_sakit, $tgl_sembuh)
    {
        $tanggal = Carbon::now();
        if ($tgl_sembuh === null) {
            $diff = Carbon::parse($tgl_sakit)->diffInDays(Carbon::parse($tanggal));
            return $diff;
        } else {
            $diff = Carbon::parse($tgl_sakit)->diffInDays(Carbon::parse($tgl_sembuh));
            return $diff;
        }
    }
}
