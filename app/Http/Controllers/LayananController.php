<?php

namespace App\Http\Controllers;

use App\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layanan = Layanan::all();
        return view('sekumukk.kelolalayanan',compact('layanan')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekumukk.addlayanan'); 
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
            'judul_layanan' => 'required',
            'foto_layanan' => 'required'
        ]);
        if($request->hasFile('foto_layanan')){
         $filenameWithExt = $request->file('foto_layanan')->getClientOriginalName();
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         $extension = $request->file('foto_layanan')->getClientOriginalExtension();
         $filenameSimpan = $filename.'_'.time().'.'.$extension;

         $path = $request->file('foto_layanan')->storeAs('public/layanan',$filenameSimpan);
     } else {
        $filenameSimpan = 'none.png';
    }
    $event = Layanan::create([
      'judul_layanan' => $request->judul_layanan,
      'foto_layanan' => $filenameSimpan
  ]);
    return redirect('/klayanan')->with('success','Data berhasil disimpan');
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
        $layanan = Layanan::find($id);
        return view('sekumukk.editlayanan',compact('layanan'));
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
        $request->validate([
            'judul_layanan' => 'required',
            'foto_layanan' => 'required'
        ]);
        if($request->hasFile('foto_layanan')){
         $filenameWithExt = $request->file('foto_layanan')->getClientOriginalName();
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         $extension = $request->file('foto_layanan')->getClientOriginalExtension();
         $filenameSimpan = $filename.'_'.time().'.'.$extension;

         $path = $request->file('foto_layanan')->storeAs('public/layanan',$filenameSimpan);
     } else {
        $filenameSimpan = 'none.png';
    }
    $event = Layanan::find($id);
    $event->judul_layanan = $request->judul_layanan;
    Storage::delete('public/layanan/'.$event->foto_layanan);
    $event->foto_layanan = $filenameSimpan;
    $event->update();
    return redirect('/klayanan')->with('success','Data berhasil diedit');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $layanan = Layanan::find($id);
     Storage::delete('public/layanan/'.$layanan->foto_layanan);
     $layanan->delete();
     return redirect('/klayanan')->with('success','Data berhasil dihapus');
    }
}
