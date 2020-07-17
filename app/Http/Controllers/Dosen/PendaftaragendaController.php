<?php

namespace App\Http\Controllers\Dosen;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PendaftaragendaController extends Controller
{
	public function index()
	{
		$id = Session::get('id');
		if(Session::get('level') == "Instruktur") {
			$agenda = DB::table('pesertakajiandhuhas')
			->join('seksikajiandhuhas','pesertakajiandhuhas.id_seksi_kajian_dhuha', '=', 'seksikajiandhuhas.id_seksi_kajian_dhuha')
			->join('pesertas','pesertakajiandhuhas.id_peserta','=','pesertas.id_peserta')
			->join('kajiandhuhas','seksikajiandhuhas.id_jadwal','=','kajiandhuhas.id_jadwal')
			->join('users','seksikajiandhuhas.id_instruktur','=','users.id')
			->select('pesertas.*','seksikajiandhuhas.*','kajiandhuhas.*','users.*','pesertakajiandhuhas.*')
			->where('users.id','=',$id)
			->get();
		}else {
			$agenda = DB::table('pesertakajiandhuhas')
			->join('seksikajiandhuhas','pesertakajiandhuhas.id_seksi_kajian_dhuha', '=', 'seksikajiandhuhas.id_seksi_kajian_dhuha')
			->join('pesertas','pesertakajiandhuhas.id_peserta','=','pesertas.id_peserta')
			->join('kajiandhuhas','seksikajiandhuhas.id_jadwal','=','kajiandhuhas.id_jadwal')
			->join('users','seksikajiandhuhas.id_instruktur','=','users.id')
			->select('pesertas.*','seksikajiandhuhas.*','kajiandhuhas.*','users.*','pesertakajiandhuhas.*')
			->get();
		}
        //dd($agenda);
		return view('dosen.datamahasiswa',compact('agenda'));
	}
	public function print()
	{
		$id = Session::get('id');
		if(Session::get('level') == "Instruktur") {
			$agenda = DB::table('pesertakajiandhuhas')
			->join('seksikajiandhuhas','pesertakajiandhuhas.id_seksi_kajian_dhuha', '=', 'seksikajiandhuhas.id_seksi_kajian_dhuha')
			->join('pesertas','pesertakajiandhuhas.id_peserta','=','pesertas.id_peserta')
			->join('kajiandhuhas','seksikajiandhuhas.id_jadwal','=','kajiandhuhas.id_jadwal')
			->join('users','seksikajiandhuhas.id_instruktur','=','users.id')
			->select('pesertas.*','seksikajiandhuhas.*','kajiandhuhas.*','users.*','pesertakajiandhuhas.*')
			->where('users.id','=',$id)
			->get();
		}else {
			$agenda = DB::table('pesertakajiandhuhas')
			->join('seksikajiandhuhas','pesertakajiandhuhas.id_seksi_kajian_dhuha', '=', 'seksikajiandhuhas.id_seksi_kajian_dhuha')
			->join('pesertas','pesertakajiandhuhas.id_peserta','=','pesertas.id_peserta')
			->join('kajiandhuhas','seksikajiandhuhas.id_jadwal','=','kajiandhuhas.id_jadwal')
			->join('users','seksikajiandhuhas.id_instruktur','=','users.id')
			->select('pesertas.*','seksikajiandhuhas.*','kajiandhuhas.*','users.*','pesertakajiandhuhas.*')
			->get();
		}
        //dd($agenda);
		return view('dosen.cetakmhspendaftar',compact('agenda'));
	}
}
