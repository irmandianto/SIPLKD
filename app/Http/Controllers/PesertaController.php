<?php

namespace App\Http\Controllers;

use App\Fakultas;
use App\Kodeseksipeserta;
use Illuminate\Http\Request;
use App\Peserta;
use App\Nilaikajiandhuha;
use Illuminate\Support\Facades\Session;
use DB;

class PesertaController extends Controller
{

    public function index()
    {
        $data = Fakultas::all();
        $kode = Kodeseksipeserta::all();
        return view('signup',compact('data','kode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pesertas',
            'password' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'nama_panggilan' => 'required',
            'kontak' => 'required',
            'jk' => 'required',
            'fakultas' => 'required',
            'nim' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'tahun_masuk' => 'required',
            'progamstudi' => 'required',
            'dosenpai' => 'required',
            'id_kodeseksipeserta' => 'required'
        ]);

        Peserta::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nama_panggilan' => $request->nama_panggilan,
            'kontak' => $request->kontak,
            'jk' => $request->jk,
            'fakultas' => $request->fakultas,
            'nim'=> $request->nim,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'tahun_masuk' => $request->tahun_masuk,
            'progamstudi' => $request->progamstudi,
            'dosenpai' => $request->dosenpai,
            'foto' => '',
            'id_kodeseksipeserta' => $request->id_kodeseksipeserta
        ]);
        return redirect('/sign_in')
        ->with('success','Berhasil daftar!.');
    }
    public function lihat(Request $request)
    {
      $id = Session::get('id');

      $evaluasi = DB::table('pesertakajiandhuhas')
      ->join('pesertas','pesertakajiandhuhas.id_peserta','=','pesertas.id_peserta')
      ->join('nilaikajiandhuhas','pesertakajiandhuhas.id_pesertakajian','=','nilaikajiandhuhas.id_pesertakajian')
      ->select('pesertas.id_peserta','nilaikajiandhuhas.*')
      ->where('pesertas.id_peserta','LIKE',$id)
      ->get();
      //dd($evaluasi);
      $hitung = count($evaluasi);
      if($hitung > 0)
      {
          return view('peserta.lembarnilai',compact('evaluasi'));
      }else if($hitung == 0)
      {
         return redirect()->back()->with('success','Maaf Data Nilai belum tersedia!');
      }
  }
  public function printnilai(Request $request)
  {
    $id = Session::get('id');

    $evaluasi = DB::table('pesertakajiandhuhas')
    ->join('pesertas','pesertakajiandhuhas.id_peserta','=','pesertas.id_peserta')
    ->join('nilaikajiandhuhas','pesertakajiandhuhas.id_pesertakajian','=','nilaikajiandhuhas.id_pesertakajian')
    ->select('pesertas.*','nilaikajiandhuhas.*')
    ->where('pesertas.id_peserta','LIKE',$id)
    ->get();
      //dd($evaluasi);
    return view('peserta.cetaknilai',compact('evaluasi'));
}
}
