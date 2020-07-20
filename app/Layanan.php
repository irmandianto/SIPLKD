<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'layanans';
    protected $fillable = ['id','foto_layanan','judul_layanan']; 
}
