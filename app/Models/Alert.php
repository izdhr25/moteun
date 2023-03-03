<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tani;
use Spp\Models\Ternak;
use Carbon\Carbon;

class Alert extends Model
{
    use HasFactory;
    public $table = "alerts";
    protected $fillable = [
        'name',
        'name_id',
        'jenis',
        'kelamin',
        'status',
        'umur_siap',
        'umur',
        'lahir_ditanam',
        'keterangan',
        'user',
    ];

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

        Ternak::chunk(100, function ($ternak) use ($tanggal) {
            foreach ($ternak as $ternaks) {
                $umur_hari = $this->hitungUmurHari($ternaks->lahir, $tanggal);
                $ternaks->umur = $umur_hari;
                $ternaks->save();
            }
        });
    }

    public function hitungUmurHariAlert($lahir_ditanam, $tanggal)
    {
        $diff = Carbon::parse($lahir_ditanam)->diffInDays(Carbon::parse($tanggal));
        return $diff;
    }

    public function hitungUmurHariTani($ditanam, $tanggal)
    {
        $diff = Carbon::parse($ditanam)->diffInDays(Carbon::parse($tanggal));
        return $diff;
    }

    public function hitungUmurHariTernak($lahir, $tanggal)
    {
        $diff = Carbon::parse($lahir)->diffInDays(Carbon::parse($tanggal));
        return $diff;
    }

    
}
