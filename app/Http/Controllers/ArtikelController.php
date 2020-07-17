<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Article::all();
        return view('sekumukk.kelolaartikel',compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekumukk.addartikel');
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
            'judul' => 'required',
            'isi_artikel' => 'required',
            'tgl_artikel' => 'required'
        ]);
        Article::create([
            'judul' => $request->judul,
            'isi_artikel' => $request->isi_artikel,
            'tgl_artikel' => $request->tgl_artikel
        ]);
        return redirect('/artikel')->with('success','Data berhasil disimpan');
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
        $artikel = Article::find($id);
        return view('sekumukk.editartikel',compact('artikel'));
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
            'judul' => 'required',
            'isi_artikel' => 'required',
            'tgl_artikel' => 'required'
        ]);
        $artikel = Article::find($id);
        $artikel->judul = $request->judul;
        $artikel->isi_artikel = $request->isi_artikel;
        $artikel->tgl_artikel = $request->tgl_artikel;
        $artikel->update();
        return redirect('/artikel')->with('success','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Article::find($id);
        $artikel->delete();
         return redirect('/artikel')->with('success','Data berhasil dihapus');
    }
}
