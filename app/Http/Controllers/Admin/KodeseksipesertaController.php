<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kodeseksipeserta;
class KodeseksipesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodeseksi = Kodeseksipeserta::all();
        return view('admin.kelolakodeseksipeserta',compact('kodeseksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addkodeseksi');
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
            'kode_seksi_peserta' => 'required|unique:kodeseksipesertas'
        ]);

        Kodeseksipeserta::create($request->all());
        return redirect('kodeseksi')->with('success','Data berhasil ditambahkan');
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
        $data = Kodeseksipeserta::find($id);
        return view('admin.editkodeseksi',compact('data'));
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
            'kode_seksi_peserta' => 'required'
        ]);

        $kode = Kodeseksipeserta::find($id);
        $kode->kode_seksi_peserta = $request->kode_seksi_peserta;
        $kode->save();
        return redirect('kodeseksi')->with('success','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kode = Kodeseksipeserta::find($id);
        $kode->delete();
        return redirect('kodeseksi')->with('success','Data berhasil didelete');
    }
}
