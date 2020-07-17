<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kajiandhuha extends Model
{
	protected $primaryKey = 'id_jadwal';

	protected $table = 'kajiandhuhas';

	protected $fillable = ['id_jadwal','hari_kajian','jam_kajian','akhir_kajian'];


	public function seksis()
	{
		return $this->hasMany(Seksikajiandhuha::class,'id_jadwal');
	}
}