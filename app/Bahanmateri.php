<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahanmateri extends Model
{
    protected $table = "bahanmateris";
    
    protected $fillable = ['judul_materi','file','kategori']; 
}
