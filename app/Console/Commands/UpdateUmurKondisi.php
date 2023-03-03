<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Sakit_Sehat;

class UpdateUmurKondisi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tanggal = date('Y-m-d');
        $kondisi = new Sakit_Sehat();
        $tgl_sembuh = $kondisi->tgl_sembuh;
        if ($tgl_sembuh === nulll) {
            $kondisi->updateUmurByTanggal($tanggal);
            $this->info('Update kondisi berhasil dilakukan pada tanggal '.$tanggal);
        } else {
             $kondisi->updateUmurByTanggal($tgl_sembuh);
            $this->info('Update kondisi berhasil dilakukan pada tanggal '.$tgl_sembuh);
        }
    }

}
