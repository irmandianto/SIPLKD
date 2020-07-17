<?php

namespace App\Http\Controllers\Admin;

use App\Fakultas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Fakultas::alL();
        return view('admin.fakultas',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addfakultas');
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
            'nama_fakultas' => 'required'
        ]);

        Fakultas::create($request->all());

        return redirect('/fakultas')->with('success','Data berhasil ditambahkan');
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
    public function edit($id_fakultas)
    {
        $data = Fakultas::find($id_fakultas);
        return view('admin.editfakultas',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_fakultas)
    {
        $request->validate([
            'nama_fakultas' => 'required'
        ]);

        $update = Fakultas::find($id_fakultas);
        $update->nama_fakultas = $request->nama_fakultas;
        $update->update();

        return redirect('/fakultas')->with('success','Data berhasil di edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_fakultas)
    {
        $delete = Fakultas::find($id_fakultas);
        $delete->delete();
         return redirect('/fakultas')->with('success','Data berhasil di hapus');

    }
}
