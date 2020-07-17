<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeksiinstruktursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seksiinstrukturs', function (Blueprint $table) {
            $table->increments('id_seksi_instruktur');
            $table->string('seksi_instruktur',10);
            $table->integer('id_instruktur')->unsigned();
            $table->foreign('id_instruktur')->references('id_instruktur')->on('instrukturs');
            $table->integer('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->references('id_jadwal')->on('kajiandhuhas');
            $table->integer('kapasitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seksiinstrukturs');
    }
}
