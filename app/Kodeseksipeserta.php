<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kodeseksipeserta extends Model
{
	protected $primaryKey = "id";
	protected $table = "kodeseksipesertas";

	protected $fillable = ['id','kode_seksi_peserta'];

	public function pesertas()
	{
		return $this->hasOne(Peserta::class,'id');
	}
}
