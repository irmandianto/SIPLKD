<?php


namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Evaluasiibadah;
use App\Peserta;
use App\Pesertakajiandhuha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class EvaluasiibadahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Session::get('id');

        $evaluasi = Evaluasiibadah::where('id_peserta','LIKE','%'.$id.'%')->get();
        return view('peserta.evaluasiibadah',compact('evaluasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $id = Session::get('id');

      $data = Pesertakajiandhuha::where('id_peserta','=',$id)->count();
     // dd($data);
      if(empty($data))
      {
        return redirect('/evaluasi')->with('error','Anda belum mengambil jadwal kajian dhuha');
    }else{
        return view('peserta.addevaluasi');
    }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl_evaluasi' => 'required',
            'shalat_berjamaah' => 'required',
            'tilawah_quran' => 'required',
            'shalat_dhuha' => 'required',
            'qiyamul_lail' => 'required'
        ]);

        $id = Session::get('id');
        $simpan = new Evaluasiibadah;
        $simpan->id_peserta = Session::get('id');
        $simpan->tgl_evaluasi = $request->tgl_evaluasi;
        $simpan->tilawah_quran = $request->tilawah_quran;
        $simpan->shalat_dhuha = $request->shalat_dhuha;
        $simpan->qiyamul_lail = $request->qiyamul_lail;
        $simpan->shalat_berjamaah = $request->shalat_berjamaah;
        $simpan->save();

        return redirect('evaluasi')->with('success','Data berhasil ditambahkan');
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
    public function edit($id_evaluasi)
    {
        $editevaluasi  = Evaluasiibadah::find($id_evaluasi);
        return view('peserta.editevaluasi',compact('editevaluasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_evaluasi)
    {
      $editevaluasi  = Evaluasiibadah::find($id_evaluasi);
      $editevaluasi->tgl_evaluasi = $request->tgl_evaluasi;
      $editevaluasi->tilawah_quran = $request->tilawah_quran;
      $editevaluasi->shalat_dhuha = $request->shalat_dhuha;
      $editevaluasi->qiyamul_lail = $request->qiyamul_lail;
      $editevaluasi->shalat_berjamaah = $request->shalat_berjamaah;
      $editevaluasi->update();
      return redirect('evaluasi')->with('success','Data berhasil diedit');

  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_evaluasi)
    {
     $deldata = Evaluasiibadah::find($id_evaluasi);
     $deldata->delete();
     return redirect('evaluasi')->with('success','Data berhasil dihapus');
 }

 public function cari(Request $request)
 {
    $id = Session::get('id');
    $data = Pesertakajiandhuha::where('id_peserta','=',$id)->count();
      //dd($data);
    if(empty($data))
    {
        return redirect('/evaluasi')->with('error','Anda belum mengambil jadwal kajian dhuha');
    }else{
        $request->validate([
            'tahun' => 'required',
            'bulan' => 'required'
        ]);
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $cari = Evaluasiibadah::whereYear('tgl_evaluasi', '=', $tahun)
        ->whereMonth('tgl_evaluasi', '=', $bulan)
        ->where('id_peserta','=',$id)
        ->get();
        return view('peserta.carievaluasi',compact('cari'));
    }
}

public function print()
{
    $id = Session::get('id');
    $data = Evaluasiibadah::where('id_peserta','=',$id)->count();

    $biodata = Evaluasiibadah::where('id_peserta','=',$id)->get(); 
     // dd($data);
    if(empty($data))
    {
        return redirect('/evaluasi')->with('error','Anda belum mengambil jadwal kajian dhuha');
    }else{
        return view('peserta.cetakevaluasi',compact('biodata'));
    }
}
public function evaluasii()
{
    //$data = Peserta::all();
    $data = Peserta::all();
    $evaluasi = DB::table('pesertas')
    ->join('evaluasiibadahs','evaluasiibadahs.id_peserta','=','pesertas.id_peserta')
    ->select('pesertas.*','evaluasiibadahs.*')
    ->get();
    return view('instruktur.evaluasibadah',compact('data'));
}
}
