<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporankajian extends Model
{
	protected $primaryKey = 'id_laporankajian';

    protected $table = "laporankajians";

    protected $fillable = ['id_laporankajian','file_laporan'];
}
