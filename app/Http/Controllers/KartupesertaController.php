<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use App\Kajiandhuha;
use App\User;
use App\Seksikajiandhuha;
use App\Pesertakajiandhuha;
use App\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class KartupesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Session::get('id');
        $kartu = DB::table('pesertakajiandhuhas')
        ->join('seksikajiandhuhas','pesertakajiandhuhas.id_seksi_kajian_dhuha', '=', 'seksikajiandhuhas.id_seksi_kajian_dhuha')
        ->join('pesertas','pesertakajiandhuhas.id_peserta','=','pesertas.id_peserta')
        ->join('kajiandhuhas','seksikajiandhuhas.id_jadwal','=','kajiandhuhas.id_jadwal')
        ->join('users','seksikajiandhuhas.id_instruktur','=','users.id')
        ->select('pesertas.id_peserta','seksikajiandhuhas.*','kajiandhuhas.*','users.*','pesertakajiandhuhas.*')
        ->where('pesertas.id_peserta','LIKE',$id)
        ->get();
        //dd($kartu);

        return view('peserta.kartukajian',compact('kartu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kajian = Pesertakajiandhuha::all();
        $userphoto = User::all();
        $jadwal = Seksikajiandhuha::all();
        foreach ($kajian as $key) {
            $cari = Seksikajiandhuha::where('id_seksi_kajian_dhuha','=',$key->id_seksi_kajian_dhuha)->get();
            $hitung = Pesertakajiandhuha::where('id_seksi_kajian_dhuha','LIKE','%'.$key->id_seksi_kajian_dhuha.'%')->count();
            //dd($key);
        }
        return view('peserta.addkartukajian',compact('jadwal','userphoto','kajian','cari','hitung'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate(['id_seksi_kajian_dhuha' => 'required']);

      $id_peserta = Session::get('id');

      Pesertakajiandhuha::create([
        'id_peserta' => $id_peserta,
        'id_seksi_kajian_dhuha' => $request->id_seksi_kajian_dhuha
    ]);
      return redirect('/kartukajian')->with('success','Berhasil ditambahkan');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_seksi_kajian_dhuha)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pesertakajian)
    {
        $delete = Pesertakajiandhuha::find($id_pesertakajian);
        $delete->delete();
        return redirect('kartukajian')->with('success','Berhasil dihapus');
    }
    public function print(Request $request)
    {
        $id = Session::get('id');
        $cek = Pesertakajiandhuha::where('id_peserta','=',$id)->count();
        if($cek > 0)
        {
         $kartu = DB::table('pesertakajiandhuhas')
         ->join('seksikajiandhuhas','pesertakajiandhuhas.id_seksi_kajian_dhuha', '=', 'seksikajiandhuhas.id_seksi_kajian_dhuha')
         ->join('pesertas','pesertakajiandhuhas.id_peserta','=','pesertas.id_peserta')
         ->join('kajiandhuhas','seksikajiandhuhas.id_jadwal','=','kajiandhuhas.id_jadwal')
         ->join('users','seksikajiandhuhas.id_instruktur','=','users.id')
         ->select('pesertas.*','seksikajiandhuhas.*','kajiandhuhas.*','users.*','pesertakajiandhuhas.*')
         ->where('pesertas.id_peserta','LIKE',$id)
         ->get();
        // /dd($kartu);

         return view('peserta.cetakkartu',compact('kartu'));

     }else if($cek == 0)
     {
       return redirect('/kartukajian')->with('success','Maaf anda anda belum memilih jadwal kajian!');
   }
}
}

