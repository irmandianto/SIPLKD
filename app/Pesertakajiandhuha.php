<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesertakajiandhuha extends Model
{
    protected $primaryKey = 'id_pesertakajian';

    protected $table = 'pesertakajiandhuhas';

    protected $fillable = ['id_pesertakajian','id_peserta','id_seksi_kajian_dhuha'];


    public function datanilai()
    {
    	return $this->hasOne(Nilaikajiandhuha::class,'id_pesertakajian');
    }

    public function datapeserta()
    {
    	return $this->belongsTo(Peserta::class,'id_peserta');
    }
}
