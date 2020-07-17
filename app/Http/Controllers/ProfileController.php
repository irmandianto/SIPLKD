<?php

namespace App\Http\Controllers;
use App\Pengumuman;
use App\User;
use App\Fakultas;
use App\Kodeseksipeserta;
use App\Peserta;	
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
	public function data()
	{
		$datap = Pengumuman::all();
		if(Session::get('level') == "Peserta")
		{
			$fakultas = Fakultas::all();
			$kode = Kodeseksipeserta::all();
			$id_peserta = Session::get('id');
			$data = Peserta::find($id_peserta);
			return view('editprofile',compact('data','datap','fakultas','kode'));
		}else{
			$id = Session::get('id');
			$data = User::find($id);
			return view('editprofile',compact('data','datap'));
		}
	}

	public function updateUser(Request $request)
	{
		$request->validate([
			'nama_lengkap_user' => 'required',
			'username' => 'required',
			'password' => 'required',
			'email_user' => 'required',
			'jk_user' => 'required',
			'kontak_user' => 'required',
			'foto_user' => 'required'
		]);

		if($request->hasFile('foto_user')){
			$filenameWithExt = $request->file('foto_user')->getClientOriginalName();
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			$extension = $request->file('foto_user')->getClientOriginalExtension();
			$filenameSimpan = $filename.'_'.time().'.'.$extension;

			$path = $request->file('foto_user')->storeAs('public/foto',$filenameSimpan);
		} else {
			$filenameSimpan = 'noimg.jpg';
		}
		$id = Session::get('id');
		$userdata = User::find($id);
		$userdata->nama_lengkap_user = $request->nama_lengkap_user;
		$userdata->username = $request->username;
		$userdata->password = bcrypt($request->password);
		$userdata->email_user = $request->email_user;
		$userdata->jk_user = $request->jk_user;
		$userdata->kontak_user = $request->kontak_user;
		Storage::delete('public/foto'.'/'.$userdata->foto_user);
		$userdata->foto_user = $filenameSimpan;
		$userdata->update();
		return redirect('/profile')->with('success','Data berhasil di perbarui');
	}
	public function updatePeserta(Request $request)
	{
		$request->validate([
			'username' => 'required',
			'password' => 'required',
			'nama_lengkap' => 'required',
			'email' => 'required',
			'nama_panggilan' => 'required',
			'kontak' => 'required',
			'jk' => 'required',
			'fakultas' => 'required',
			'nim' => 'required',
			'tempat_lahir' => 'required',
			'tgl_lahir' => 'required',
			'alamat' => 'required',
			'tahun_masuk' => 'required',
			'progamstudi' => 'required',
			'dosenpai' => 'required',
			'id_kodeseksipeserta' => 'required',
			'foto' => 'required'
		]);

		if($request->hasFile('foto')){
			$filenameWithExt = $request->file('foto')->getClientOriginalName();
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			$extension = $request->file('foto')->getClientOriginalExtension();
			$filenameSimpan = $filename.'_'.time().'.'.$extension;

			$path = $request->file('foto')->storeAs('public/foto',$filenameSimpan);
		} else {
			$filenameSimpan = 'noimg.jpg';
		}
		$id_peserta = Session::get('id');
		$update = Peserta::find($id_peserta);
		$update->username = $request->username;
		$update->password = bcrypt($request->password);
		$update->nama_lengkap = $request->nama_lengkap;
		$update->email = $request->email;
		$update->nama_panggilan = $request->nama_panggilan;
		$update->kontak = $request->kontak;
		$update->jk = $request->jk;
		$update->fakultas = $request->fakultas;
		$update->nim= $request->nim;
		$update->tempat_lahir = $request->tempat_lahir;
		$update->tgl_lahir = $request->tgl_lahir;
		$update->alamat = $request->alamat;
		$update->tahun_masuk = $request->tahun_masuk;
		$update->progamstudi = $request->progamstudi;
		$update->dosenpai = $request->dosenpai;
		Storage::delete('public/foto'.'/'.$update->foto);
		$update->foto = $filenameSimpan;
		$update->id_kodeseksipeserta = $request->id_kodeseksipeserta;
		$update->save();
		return redirect('/profile')
		->with('success','Berhasil diedit!.');
	}
}
