<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertakajiandhuhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertakajiandhuhas', function (Blueprint $table) {
            $table->increments('id_peserta',3);
            $table->integer('nim');
            $table->string('nama_peserta',30);
            $table->string('jk_peserta',1);
            $table->integer('id_seksi_pai')->unsigned();
            $table->foreign('id_seksi_pai')->references('id_seksi_pai')->on('seksipais');
             $table->integer('id_seksi_kajian_dhuha')->unsigned();
             $table->foreign('id_seksi_kajian_dhuha')->references('id_seksi_kajian_dhuha')->on('seksikajiandhuhas');
             $table->integer('id_fakultas')->unsigned();
             $table->foreign('id_fakultas')->references('id_fakultas')->on('fakultas');
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
        Schema::dropIfExists('pesertakajiandhuhas');
    }
}
