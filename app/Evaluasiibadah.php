<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluasiibadah extends Model
{
    protected $primaryKey = 'id_evaluasi';

    protected $table = 'evaluasiibadahs';

    protected $fillable = ['id_evaluasi','id_peserta','tgl_evaluasi','shalat_berjamaah','shalat_dhuha','tilawah_quran','qiyamul_lail'];

    public function pesertas()
    {
    	return $this->belongsTo(Peserta::class,'id_peserta');
    }

}
