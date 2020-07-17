<?php

namespace App\Providers;
use App\User;
use App\Peserta;
use App\Pengumuman;
use App\Evaluasiibadah;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {

            $id = Session::get('id');
            if(Session::get('level') == "Peserta")
            {
                $id_peserta = Session::get('id');
                $datauser = Peserta::find($id_peserta);
            }else{
                $id = Session::get('id');
                $datauser = User::find($id);
            }

            $datapengumuman = Pengumuman::all();
            $datagrafik =  DB::table('evaluasiibadahs')
                     ->select('tgl_evaluasi','shalat_berjamaah','shalat_dhuha','tilawah_quran','qiyamul_lail')
                     ->where('id_peserta', 'LIKE', '%'.$id.'%')
                     ->get();
            View::share('datapengumuman',$datapengumuman);
            View::share('datauser',$datauser);
            View::share('datagrafik',$datagrafik);
        });
    }
}
