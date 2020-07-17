<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasiibadahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasiibadahs', function (Blueprint $table) {
            $table->increments('id_evaluasi');
            $table->integer('id_peserta')->unsigned();
             $table->foreign('id_peserta')->references('id_peserta')->on('pesertakajiandhuhas');
            $table->integer('minggu_ke');
            $table->integer('shalat_berjamaah');
            $table->integer('shalat_dhuha');
            $table->integer('tilawah_quran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluasiibadahs');
    }
}
