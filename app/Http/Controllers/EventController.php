<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();
        return view('sekumukk.kelolaevent',compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekumukk.addevent');
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
            'nama_event' => 'required',
            'deskripsi_event' => 'required',
            'foto_event' => 'required|image'
        ]);
        if($request->hasFile('foto_event')){
         $filenameWithExt = $request->file('foto_event')->getClientOriginalName();
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         $extension = $request->file('foto_event')->getClientOriginalExtension();
         $filenameSimpan = $filename.'_'.time().'.'.$extension;

         $path = $request->file('foto_event')->storeAs('public/event',$filenameSimpan);
     } else {
        $filenameSimpan = 'noimg.jpg';
    }
    $event = Event::create([
        'nama_event' => $request->nama_event,
        'deskripsi_event' => $request->deskripsi_event,
        'foto_event' => $filenameSimpan
    ]);
    return redirect('/event')->with('success','Data berhasil disimpan');
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
        $event = Event::find($id);
        return view('sekumukk.editevent',compact('event'));
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
        'nama_event' => 'required',
        'deskripsi_event' => 'required',
        'foto_event' => 'required|image'
    ]);
       if($request->hasFile('foto_event')){
         $filenameWithExt = $request->file('foto_event')->getClientOriginalName();
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         $extension = $request->file('foto_event')->getClientOriginalExtension();
         $filenameSimpan = $filename.'_'.time().'.'.$extension;

         $path = $request->file('foto_event')->storeAs('public/event',$filenameSimpan);
     } else {
        $filenameSimpan = 'noimg.jpg';
    }
    $event = Event::find($id);
    $event->nama_event = $request->nama_event;
    $event->deskripsi_event = $request->deskripsi_event;
    Storage::delete('public/event/'.$event->foto_event);
    $event->foto_event = $filenameSimpan;
    $event->update();
    return redirect('/event')->with('success','Data berhasil diedit');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $event = Event::find($id);
     Storage::delete('public/event/'.$event->foto_event);
     $event->delete();
     return redirect('/event')->with('success','Data berhasil dihapus');
 }
}
