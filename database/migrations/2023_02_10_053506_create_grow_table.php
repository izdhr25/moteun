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
        Schema::create('grow', function (Blueprint $table) {
            $table->id();
            $table->string('id_betina');
            $table->string('id_jantan');
            $table->date('mulai');
            $table->date('akhir')->nullable();
            $table->text('keterangan');
            $table->string('hasil');
            $table->string('status');
            $table->text('sebab');
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
        Schema::dropIfExists('grow');
    }
};
