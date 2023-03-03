<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sakit_sehats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_id');
            $table->string('nama');
            $table->string('jenis');
            $table->date('tgl_sakit');
            $table->string('lama_sakit')->nullable();
            $table->date('tgl_sembuh')->nullable();
            $table->string('obat');
            $table->string('perawat');
            $table->string('status');
            $table->string('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sakit_sehats');
    }
};
