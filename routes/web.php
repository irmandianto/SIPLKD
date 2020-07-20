<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Umum

Route::get('/','HomeController@index');
Route::get('/detail/{id}/','HomeController@show');
Route::get('/layanan','HomeController@layanan');
Route::get('/acara','HomeController@event');
Route::get('/about','HomeController@about');
Route::get('sign_in','AuthController@index');
Route::post('/sign_in','AuthController@postLogin');
Route::get('/sign_up','PesertaController@index');
Route::post('/sign_up','PesertaController@store');
Route::get('/logout','AuthController@Logout');


Route::group(['middleware' => 'cekuser'], function() {
	Route::get('/dashboard','AuthController@dashboard')->middleware('cekuser');
	Route::get('/profile','ProfileController@data');
	Route::post('/profile/updateUser','ProfileController@updateUser');
	Route::post('/profile/updatePeserta','ProfileController@updatePeserta');
});

Route::group(['middleware' => 'cekpeserta'], function(){
	Route::get('/cetakkartu','KartupesertaController@print');
	Route::get('/evaluasi/print','Peserta\EvaluasiibadahController@print');
	Route::get('/evaluasi/cari','Peserta\EvaluasiibadahController@cari');
	Route::post('/evaluasi','Peserta\EvaluasiibadahController@store');
	Route::resource('/kartukajian','KartupesertaController');
	Route::resource('/evaluasi','Peserta\EvaluasiibadahController');
	Route::get('/lembarnilai','PesertaController@lihat');
	Route::get('/lembarnilai/cetak','PesertaController@printnilai');
});

Route::group(['middleware' => 'cekadmin'], function(){
	Route::resource('laporan','Admin\LaporankajianController');
	Route::resource('users','KelolauserController');
	Route::resource('kodeseksi','Admin\KodeseksipesertaController');
	Route::resource('fakultas','Admin\FakultasController');
	Route::resource('jadwal','KajiandhuhaController');
	Route::resource('seksikajian','SeksikajianController');
	Route::get('mhsterdaftar','KelolauserController@listmhs');
	Route::get('mhsterdaftar/{id_peserta}/edit','KelolauserController@ubah');
	Route::put('mhsterdaftar/{id_peserta}','KelolauserController@simpan');
	Route::get('mhsterdaftar/{id_peserta}','KelolauserController@hapus');
});

Route::group(['middleware' => 'cekdosen'], function(){
	Route::get('laporankajian','LaporanController@index');
});

Route::group(['middleware' => 'cekinstruktur'], function(){
	Route::get('viewevaluasi','Peserta\EvaluasiibadahController@evaluasii');
	Route::get('entrinilai','EntrinilaiController@index');
	Route::get('entrinilai/{id_peserta}','EntrinilaiController@edit');
	Route::post('entrinilai/{id_pesertakajian}','EntrinilaiController@update');
	Route::get('/listdatanilai','EntrinilaiController@listnilai');
	Route::get('entrinilai/list/{id_peserta}/edit','EntrinilaiController@listedit');
	Route::delete('/entrinilai/list/{id_nilai}','EntrinilaiController@destroy');
	Route::patch('/entrinilai/list/{id_nilai}','EntrinilaiController@listupdate');
});

Route::group(['middleware' => 'cekukk'],  function(){
	Route::get('/kodeseksii','Sekumudk\SekumudkController@index');
	Route::resource('event','EventController');
	Route::resource('artikel','ArtikelController');
	Route::resource('klayanan','LayananController');
	Route::get('/akunpengguna','Sekumudk\SekumudkController@indexp');
	Route::get('/akunpengguna/cetak','Sekumudk\SekumudkController@indexpp');
	Route::get('/laporankodeseksi','Sekumudk\SekumudkController@printkodeseksi');
});

Route::group(['middleware' => 'cekpendaftar'], function(){
	Route::get('pendaftar','Dosen\PendaftaragendaController@index');
	Route::get('/pendaftar/cetak','Dosen\PendaftaragendaController@print');
});


Route::resource('datainstruktur','Sekumudk\InstrukturController')->middleware('ceksekumudk');
Route::resource('materi','Dosen\BahanmateriController')->middleware('cekmateri');
Route::resource('pengumumans','PengumumanController')->middleware('cekpengumuman');



// dosen : pendaftar, materi, pendaftar/cetak
// ukk :  pendaftar,pengumuman
// admin : pengumuman,laporan,seksikajian



//ukk




//Route::get('peserta','AuthController@peserta')->middleware('cekpeserta');
// Route::get('dosen','AuthController@dosen');

// Route::get('instruktur','AuthController@instruktur');

// Route::get('sekumdk','AuthController@sekumdk');

// Route::get('sekumukk','AuthController@sekumukk');




// admin 


// All




// Peserta



// Route::get('/peserta/kartukajian','KartupesertaController@index');
// Route::get('/peserta/kartukajian','KartupesertaController@create');
// Route::post('/peserta/kartukajian','KartupesertaController@store');

// Dosen, Instruktur

// Route::get('/dashboard/user','Kelolauser@index');

// Route::get('/dashboard/user/add','Kelolauser@create');

// Route::post('/dashboard/user/add','Kelolauser@store');