<?php

namespace App\Http\Controllers;
use App\Kajiandhuha;
use App\User;
use App\Seksikajiandhuha;
use App\Pesertakajiandhuha;
use Illuminate\Http\Request;

class SeksikajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userphoto = User::all();
        $jadwal = Seksikajiandhuha::all();
        return view('admin.seksikajian',compact('jadwal','userphoto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idtutor = User::where('level','=','Instruktur')->get();
        $idjadwal = Kajiandhuha::all();
        return view('admin.addseksikajian',compact('idtutor','idjadwal'));
        //
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
            'seksi_kajian_dhuha' => 'required',
            'id' => 'required',
            'id_jadwal' => 'required',
            'kapasitas' => 'required'
        ]);
        Seksikajiandhuha::create([
            'seksi_kajian_dhuha' => $request->seksi_kajian_dhuha,
            'id_instruktur' => $request->id,
            'id_jadwal' => $request->id_jadwal,
            'kapasitas' => $request->kapasitas
        ]);

        return redirect('/seksikajian')
        ->with('success','Berhasil ditambahkan!.');
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
    public function edit($id_seksi_kajian_dhuha)
    {
        $idtutor = User::where('level','=','Instruktur')->get();
        $idjadwal = Kajiandhuha::all();
        $cari = Seksikajiandhuha::find($id_seksi_kajian_dhuha);
        return view('admin.editseksikajian',compact('cari','idtutor','idjadwal')); 
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
      $request->validate([
        'seksi_kajian_dhuha' => 'required',
        'id' => 'required',
        'id_jadwal' => 'required',
        'kapasitas' => 'required'
    ]);
      $update = Seksikajiandhuha::find($id_seksi_kajian_dhuha);
      $update->seksi_kajian_dhuha =$request->seksi_kajian_dhuha;
      $update->id_instruktur =  $request->id;
      $update->id_jadwal = $request->id_jadwal;
      $update->kapasitas = $request->kapasitas;
      $update->update();


      return redirect('/seksikajian')
      ->with('success','Berhasil diedit!.');

  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_seksi_kajian_dhuha)
    {
        $cari = Pesertakajiandhuha::where('id_seksi_kajian_dhuha','=',$id_seksi_kajian_dhuha)->count();
        if($cari > 0 )
        {
         return redirect('/seksikajian')
         ->with('error','Peserta masih ada yang terdaftar!');
     }else{

         $delete = Seksikajiandhuha::find($id_seksi_kajian_dhuha);
         $delete->delete();

         return redirect('/seksikajian')
         ->with('success','Berhasil didelete!.');
     }

 }
}
