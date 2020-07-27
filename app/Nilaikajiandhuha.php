<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilaikajiandhuha extends Model
{
    protected $table = 'nilaikajiandhuhas';

    protected $primaryKey = 'id_nilai';

    protected $fillable = ['id_nilai','id_pesertakajian','id_peserta','id_instruktur','nilai_keaktifan','nilai_kehadiran','nilai_ujian','praktik_ibadah','huruf_keaktifan','huruf_kehadiran','huruf_praktikibadah','huruf_ujianakhir'];

    public function datapesertakajian()
    {
    	return $this->belongsTo(Pesertakajiandhuha::class,'id_pesertakajian');
    }
}

