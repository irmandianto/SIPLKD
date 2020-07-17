<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
      protected $table = "pengumumen";
 
    protected $fillable = ['judul','isi_pengumuman'];
}
