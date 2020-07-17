<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->increments('id_peserta');
            $table->string('username');
            $table->string('password');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nama_panggilan');
            $table->string('kontak');
            $table->string('jk');
            $table->string('fakultas');
            $table->string('nim');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('tahun_masuk');
            $table->string('seksi_pai');
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
        Schema::dropIfExists('pesertas');
    }
}
