<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $primaryKey = 'id';
     protected $table = "users";

    protected $fillable = [
        'id','nama_lengkap_user', 'username', 'password','email_user','level','jk_user','kontak_user'
    ];

    public function suser()
    {
    	return $this->hasMany(Seksikajiandhuha::class,'id_instruktur');
    }
}
