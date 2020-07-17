<?php

namespace App\Http\Controllers\Dosen;

use App\Bahanmateri;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class BahanmateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahanmateri::all();
        return view('dosen.kelolabahanmateri',compact('bahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.addbahan');        
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
            'judul_materi' => 'required',
            'file' => 'required|file|max:10000'
        ]);

        if($request->hasFile('file')){
           $filenameWithExt = $request->file('file')->getClientOriginalName();
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           $extension = $request->file('file')->getClientOriginalExtension();
           $filenameSimpan = $filename.'_'.time().'.'.$extension;

           $path = $request->file('file')->storeAs('public/bahanmateri',$filenameSimpan);
       } else {
        $filenameSimpan = 'noimg.jpg';
    }

    $bahan = new Bahanmateri;
    $bahan->id_dosen = Session::get('id');
    $bahan->judul_materi = $request->judul_materi;
    $bahan->file = $filenameSimpan;
    $bahan->save();

    return redirect('materi')->with('success','Data Telah disimpan!');
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
        $editBahan = Bahanmateri::find($id);
        return view('dosen.editbahan',compact('editBahan'));
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
            'judul_materi' => 'required',
            'file' => 'required|file|max:10000'
        ]);

        if($request->hasFile('file')){
           $filenameWithExt = $request->file('file')->getClientOriginalName();
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           $extension = $request->file('file')->getClientOriginalExtension();
           $filenameSimpan = $filename.'_'.time().'.'.$extension;

           $path = $request->file('file')->storeAs('public/bahanmateri',$filenameSimpan);
       } else {
        $filenameSimpan = 'noimg.jpg';
    }

    $bahan = Bahanmateri::find($id);
    $bahan->judul_materi = $request->judul_materi;
    Storage::delete('public/bahanmateri/'.$bahan->file);
    $bahan->file = $filenameSimpan;
    $bahan->update();

    return redirect('materi')->with('success','Data Sukses diupdate!');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delBahan = Bahanmateri::find($id);
        $data = 'bahanmateri'.'/'.$delBahan->file;
        Storage::delete('public/bahanmateri'.'/'.$delBahan->file);
        
        $delBahan->delete();
        return redirect('materi')->with('success','Data berhasil didelete');
    }
}
