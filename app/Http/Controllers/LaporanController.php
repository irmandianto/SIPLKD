<?php

namespace App\Http\Controllers;

use App\Laporankajian;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
    	$data = Laporankajian::all();
    	return view('dosen.laporankajian',compact('data'));
    }
}
