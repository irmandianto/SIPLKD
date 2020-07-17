<?php

namespace App\Http\Controllers;

use App\Kajiandhuha;

use Illuminate\Http\Request;

class KajiandhuhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getKajian = Kajiandhuha::all();
        return view('all.jadwalkajian',compact('getKajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('all.addjadwal');
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
            'hari_kajian' => 'required',
            'jam_kajian' => 'required',
            'akhir_kajian' => 'required'
        ]);        
        Kajiandhuha::create($request->all());
        return redirect('/jadwal')->with('success','Data berhasil ditambahkan');
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
    public function edit($id_jadwal)
    {
        $carijawdal = Kajiandhuha::find($id_jadwal);
        return view('all.editjadwal',compact('carijawdal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jadwal)
    {
        $request->validate([
            'hari_kajian' => 'required',
            'jam_kajian' => 'required',
            'akhir_kajian' => 'required'
        ]);

        $updateKajian = Kajiandhuha::find($id_jadwal); 
        $updateKajian->hari_kajian = $request->hari_kajian;
        $updateKajian->jam_kajian = $request->jam_kajian;
        $updateKajian->akhir_kajian = $request->akhir_kajian;
        $updateKajian->update();
        return redirect('/jadwal')->with('success','Data berhasil diedit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jadwal)
    {
        $deleteKajian = Kajiandhuha::find($id_jadwal);
        $deleteKajian->delete();
        return redirect('/jadwal')->with('success','Data berhasil didelete');
    }
}
