<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaikajiandhuhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaikajiandhuhas', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->integer('id_peserta')->unsigned();
             $table->foreign('id_peserta')->references('id_peserta')->on('pesertakajiandhuhas');
            $table->float('nilai_kehadiran');
            $table->float('nilai_keaktifan');
            $table->float('praktik_ibadah');
            $table->float('nilai_ujian');
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
        Schema::dropIfExists('nilaikajiandhuhas');
    }
}
