<?php

namespace App\Http\Controllers;

use DB;
use App\Peserta;
use App\Nilaikajiandhuha;
use App\Pesertakajiandhuha;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class EntrinilaiController extends Controller
{
	public function index()
	{
		$id = Session::get('id');
		$agenda = DB::table('pesertakajiandhuhas')
		->join('seksikajiandhuhas','pesertakajiandhuhas.id_seksi_kajian_dhuha', '=', 'seksikajiandhuhas.id_seksi_kajian_dhuha')
		->join('pesertas','pesertakajiandhuhas.id_peserta','=','pesertas.id_peserta')
		->join('kajiandhuhas','seksikajiandhuhas.id_jadwal','=','kajiandhuhas.id_jadwal')
		->join('users','seksikajiandhuhas.id_instruktur','=','users.id')
		->select('pesertas.*','seksikajiandhuhas.*','kajiandhuhas.*','users.*','pesertakajiandhuhas.*')
		->where('users.id','=',$id)
		->get();
		return view('instruktur.entrinilai',compact('agenda'));
	}
	public function edit(Request $request,$id_peserta)
	{
		$carikajian = Pesertakajiandhuha::find($id_peserta);
		$cari = Peserta::find($carikajian->id_peserta);
		return view('instruktur.addnilai',compact('cari','carikajian'));
	}

	public function update(Request $request,$id_pesertakajian)
	{
		$request->validate([
			'kehadiran' => 'required',
			'keaktifan' => 'required',
			'praktik_ibadah' => 'required',
			'ujianakhir' => 'required',
			'huruf_kehadiran' => 'required',
			'huruf_keaktifan' => 'required',
			'huruf_praktikibadah' => 'required',
			'huruf_ujianakhir' => 'required'	
		]);
		Nilaikajiandhuha::create([
			"id_pesertakajian" => $id_pesertakajian,
			"id_instruktur" => Session::get('id'),
			"nilai_kehadiran" => $request->kehadiran,
			"nilai_keaktifan" => $request->keaktifan,
			"praktik_ibadah" => $request->praktik_ibadah,
			"nilai_ujian" => $request->ujianakhir,
			"huruf_kehadiran" => $request->huruf_kehadiran,
			"huruf_keaktifan" => $request->huruf_keaktifan,
			"huruf_praktikibadah" => $request->huruf_praktikibadah,
			"huruf_ujianakhir" => $request->huruf_ujianakhir
		]);
		return redirect('/entrinilai')->with('success','Data berhasill disimpan');

	}
	public function listnilai()
	{
		$id = Session::get('id');
		$nilai = Nilaikajiandhuha::where('id_instruktur','LIKE','%'.$id.'%')->get();
		return view('instruktur.kelolanilai',compact('nilai'));
	}
	public function listedit(Request $request, $id_nilai)
	{
		$nilai = Nilaikajiandhuha::find($id_nilai);
		return view('instruktur.editnilai',compact('nilai'));
	}
	public function listupdate(Request $request, $id_nilai)
	{
		$request->validate([
			'kehadiran' => 'required',
			'keaktifan' => 'required',
			'praktik_ibadah' => 'required',
			'ujianakhir' => 'required',
			'huruf_kehadiran' => 'required',
			'huruf_keaktifan' => 'required',
			'huruf_praktikibadah' => 'required',
			'huruf_ujianakhir' => 'required'	
		]);
		$update = Nilaikajiandhuha::find($id_nilai);
		$update->nilai_kehadiran = $request->kehadiran;
		$update->nilai_keaktifan = $request->keaktifan;
		$update->praktik_ibadah = $request->praktik_ibadah;
		$update->nilai_ujian = $request->ujianakhir;
		$update->huruf_kehadiran = $request->huruf_kehadiran;
		$update->huruf_keaktifan = $request->huruf_keaktifan;
		$update->huruf_praktikibadah = $request->huruf_praktikibadah;
		$update->huruf_ujianakhir = $request->huruf_ujianakhir;
		$update->update();
		return redirect('/listdatanilai')->with('success','Data berhasill diedit');
	}

	public function destroy(Request $request, $id_nilai)
	{
		$del = Nilaikajiandhuha::find($id_nilai);
		$del->delete();
		return redirect('/listdatanilai')->with('success','Berhasill di delete');
	}
}
