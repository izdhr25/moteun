<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ternak;

class UpdateUmurTernak extends Command
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
        $ternak = new Ternak();
        $ternak->updateUmurByTanggal($tanggal);
        $this->info('Update umur ternak berhasil dilakukan pada tanggal '.$tanggal);
    }

}
