<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seksikajiandhuha extends Model
{

	protected $primaryKey = 'id_seksi_kajian_dhuha';

	protected $table = 'seksikajiandhuhas';

	protected $fillable = ['id_seksi_kajian_dhuha','seksi_kajian_dhuha','id_instruktur','id_jadwal','kapasitas'];

	public function tutors()
	{
		return $this->belongsTo(User::class,'id_instruktur');
	}
	public function jadwals()
	{
		return $this->belongsTo(Kajiandhuha::class,'id_jadwal');
	}
	// public function pesertas()
	// {
	// 	return $this->belongsToMany(Peserta::class,'seksikajiandhuhas','id_seksi_kajian_dhuha','id_peserta');
	// }
}
