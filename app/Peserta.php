<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{

	protected $primaryKey = 'id_peserta';
    protected $table = "pesertas";
 
    protected $fillable = ['id_peserta','username','password','nama_lengkap','email','nama_panggilan','kontak','jk','fakultas','nim','tempat_lahir','tgl_lahir','alamat','tahun_masuk','progamstudi','dosenpai','foto','id_kodeseksipeserta'];

    public function seksikartu()
    {
    	return $this->belongsToMany(Seksikajiandhuha::class,'seksikajiandhuhas','id_peserta','id_seksi_kajian_dhuha');
    }
    public function evaluasis()
    {
    	return $this->hasMany(Evaluasiibadah::class,'id_peserta');
    }
    public function datapesertakajian()
    {
        return $this->hasMany(Pesertakajiandhuha::class,'id_peserta');
    }
    public function kodeseksi()
    {
        return $this->belongsTo(Kodeseksipeserta::class,'id_kodeseksipeserta');
    }
}
