<?php

namespace App\Http\Controllers\Sekumudk;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class InstrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataUser = User::where('level', '=','Instruktur')->get();
        return view('sekumudk.kelolainstruktur', compact('dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekumudk.addinstruktur');
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
            'nama_lengkap_user' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'email_user' => 'required',
            'jk_user' => 'required',
            'kontak_user' => 'required'
        ]);

        User::create([
            'nama_lengkap_user' => $request->nama_lengkap_user,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email_user' => $request->email_user,
            'level' => "Instruktur",
            'jk_user' => $request->jk_user,
            'kontak_user' => $request->kontak_user,
            'foto_user' => ''
        ]);
        
        return redirect('datainstruktur')
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datanilai()
    {
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
}
