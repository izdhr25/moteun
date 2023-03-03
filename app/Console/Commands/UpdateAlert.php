<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tani;
use App\Models\Ternak;

class UpdateAlert extends Command
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

        $alert = new Alert();
        $alert->updateUmurByTanggal($tanggal);
        $this->info('Update umur alert berhasil dilakukan pada tanggal '.$tanggal);

        $tani = new Tani();
        $tani->updateUmurByTanggal($tanggal);
        $this->info('Update umur tani berhasil dilakukan pada tanggal '.$tanggal);

        $ternak = new Ternak();
        $ternak->updateUmurByTanggal($tanggal);
        $this->info('Update umur ternak berhasil dilakukan pada tanggal '.$tanggal);
    }

}
