<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeksikajiandhuhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seksikajiandhuhas', function (Blueprint $table) {
            $table->increments('id_seksi_kajian_dhuha',3);
            $table->string('seksi_kajian_dhuha',30);
            $table->integer('id_instruktur')->unsigned();
            $table->foreign('id_instruktur')->references('id_instruktur')->on('instrukturs');
            $table->integer('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->references('id_jadwal')->on('kajiandhuhas');
            $table->integer('kapasitas');
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
        Schema::dropIfExists('seksikajiandhuhas');
    }
}
