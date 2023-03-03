<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tani;

class UpdateUmurTani extends Command
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
        $tani = new Tani();
        $tani->updateUmurByTanggal($tanggal);
        $this->info('Update umur tani berhasil dilakukan pada tanggal '.$tanggal);
    }

}
