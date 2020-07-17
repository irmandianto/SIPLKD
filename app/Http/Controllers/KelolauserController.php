<?php

namespace App\Http\Controllers;
use App\Pesertakajiandhuha;
use App\Evaluasiibadah;
use App\Fakultas;
use App\Kodeseksipeserta;
use App\Peserta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelolauserController extends Controller
{
	public function index()
	{
		$dataUser = User::all();
		return view('admin.kelolauser', compact('dataUser'));
	}
	public function create()
	{
		return view('admin.adduser');
	}
	public function store(Request $request)
	{
		$data = $this->validateData();


		User::create([
			'nama_lengkap_user' => $request->nama_lengkap,
			'username' => $request->username,
			'password' => bcrypt($request->password),
			'email_user' => $request->email,
			'level' => $request->level,
			'jk_user' => $request->jk_user,
			'kontak_user' => $request->kontak,
			'foto_user' => ''
		]);
		
		return redirect('/users')
		->with('success','Berhasil ditambahkan!.');

	}
	public function update(Request $request,$id)
	{
		
		$data = $this->validateData();

		$userdata = User::find($id);
		$userdata->nama_lengkap_user = $request->nama_lengkap;
		$userdata->username = $request->username;
		$userdata->password = bcrypt($request->password);
		$userdata->email_user = $request->email;
		$userdata->level = $request->level;
		$userdata->jk_user = $request->jk_user;
		$userdata->kontak_user = $request->kontak;
		$userdata->foto_user = 'none.jpg';
		$userdata->save();

		return redirect('/users')
		->with('success','Berhasil dieedit!.');
	}
	public function destroy($id)
	{
		$delData = User::find($id);
		Storage::delete('public/foto'.'/'.$delData->foto_user);
		$delData->delete();
		return redirect('/users')
		->with('success','Berhasil dihapus!.');

	}
	public function edit($id)
	{
		$editData = User::find($id);
		return view('admin.edituser', compact('editData'));
	}
	private function validateData()
	{
		return request()->validate([
			'nama_lengkap' => 'required',
			'username' => 'required|unique:users',
			'password' => 'required',
			'email' => 'required',
			'level' => 'required',
			'jk_user' => 'required',
			'kontak' => 'required'
		]);
	}
	public function listmhs()
	{
		$pengguna = Peserta::all();
		return view('admin.mhsterdaftar',compact('pengguna')); 
	}
	public function ubah(Request $request,$id_peserta)
	{
		$data = Fakultas::all();
		$kode = Kodeseksipeserta::all();
		$pengguna = Peserta::find($id_peserta);
		return view('admin.editmhsterdaftar',compact('pengguna','data','kode'));
	}
	public function simpan(Request $request,$id_peserta)
	{
		$request->validate([
			'username' => 'required|unique:pesertas',
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
			'id_kodeseksipeserta' => 'required'
		]);

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
		$update->foto = $request->foto;
		$update->id_kodeseksipeserta = $request->id_kodeseksipeserta;
		$update->save();
		return redirect('/mhsterdaftar')
		->with('success','Berhasil diedit!.');
	}
	public function hapus(Request $request, $id_peserta)
	{
		$cari1 = Pesertakajiandhuha::where('id_peserta','=',$id_peserta)->count();
		$cari2 = Evaluasiibadah::where('id_peserta','=',$id_peserta)->count();

		($cari1);
		if($cari1 > 0 || $cari2 >0)
		{
			return redirect('/mhsterdaftar')
			->with('error','Peserta Masih terdaftar di kajaian!.');
		}else{
			$delete = Peserta::find($id_peserta);
			Storage::delete('public/foto'.'/'.$delete->foto);
			$delete->delete();
			return redirect('/mhsterdaftar')
			->with('success','Berhasil didelete!.');

		}
	}
}
