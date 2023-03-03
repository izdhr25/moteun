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
        Schema::create('ternak', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hewan');
            $table->string('jenis');
            $table->string('kelamin');
            $table->date('lahir');
            $table->string('umur')->nullable();
            $table->date('mati')->nullable();
            $table->string('hasil');
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
        Schema::dropIfExists('ternak');
    }
};
