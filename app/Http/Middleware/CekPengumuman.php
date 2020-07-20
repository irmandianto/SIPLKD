<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class CekPengumuman
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::get('login')) {
           return redirect('/sign_in')->with('alert','Kamu harus login dulu');
       } 

       if((Session::get('level') === "Admin") || (Session::get('level') === "Sekretaris Umum Qatulistiwa Islam"))  {
        return $next($request);
    }else {
        return redirect()->back();
    }

}
}
