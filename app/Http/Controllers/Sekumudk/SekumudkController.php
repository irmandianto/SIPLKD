<?php

namespace App\Http\Controllers\Sekumudk;

use App\Peserta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Kodeseksipeserta;
class SekumudkController extends Controller
{
	public function printkodeseksi()
	{
		$kodeseksi = Kodeseksipeserta::all();
		return view('sekumudk.cetakkodeseksi',compact('kodeseksi'));
	}
	public function index()
	{
		$kodeseksi = Kodeseksipeserta::all();
		return view('admin.kelolakodeseksipeserta',compact('kodeseksi'));
	}

	public function indexp()
	{
		$pengguna = Peserta::all(); 
		return view('sekumudk.akunpengguna',compact('pengguna'));
	}
	public function indexpp()
	{
		$pengguna = Peserta::all(); 
		return view('sekumudk.cetakakunpengguna',compact('pengguna'));
	}

}
