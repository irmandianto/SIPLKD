<?php

namespace App\Http\Controllers\Admin;

use App\Laporankajian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporankajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Laporankajian::all();
        return view('admin.laporankajiandhuha',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addlaporan');
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
            'judul_laporan' => 'required',
            'file_laporan' => 'required'
        ]);

        if($request->hasFile('file_laporan')){
           $filenameWithExt = $request->file('file_laporan')->getClientOriginalName();
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           $extension = $request->file('file_laporan')->getClientOriginalExtension();
           $filenameSimpan = $filename.'_'.time().'.'.$extension;

           $path = $request->file('file_laporan')->storeAs('public/laporankajian',$filenameSimpan);
       } else {
        $filenameSimpan = 'noimg.jpg';
    }

    $bahan = new laporankajian;
    $bahan->judul_laporan = $request->judul_laporan;
    $bahan->file_laporan = $filenameSimpan;
    $bahan->save();

    return redirect('/laporan')->with('success','Data Telah disimpan!');
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
    public function edit($id_laporankajian)
    {
        $id = $id_laporankajian;
        //printf($id_laporankajian);
        $data = Laporankajian::find($id_laporankajian);
        return view('admin.editlaporan',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_laporankajian)
    {
       $request->validate([
        'judul_laporan' => 'required',
        'file_laporan' => 'required'
    ]);

       if($request->hasFile('file_laporan')){
           $filenameWithExt = $request->file('file_laporan')->getClientOriginalName();
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           $extension = $request->file('file_laporan')->getClientOriginalExtension();
           $filenameSimpan = $filename.'_'.time().'.'.$extension;

           $path = $request->file('file_laporan')->storeAs('public/laporankajian',$filenameSimpan);
       } else {
        $filenameSimpan = 'noimg.jpg';
    }

    $bahan = Laporankajian::find($id_laporankajian);
    $bahan->judul_laporan = $request->judul_laporan;

    Storage::delete('public/laporankajian'.'/'.$bahan->file_laporan);
    $bahan->file_laporan = $filenameSimpan;
    $bahan->update();

    return redirect('/laporan')->with('success','Data berhasil di update!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_laporankajian)
    {
        $bahan = Laporankajian::find($id_laporankajian);
        Storage::delete('public/laporankajian'.'/'.$bahan->file_laporan);
        $bahan->delete();

        return redirect('/laporan')->with('success','Data berhasil di hapus');
    }
}
