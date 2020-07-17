<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
 public function postLogin(Request $request){
   $request->validate([
    'username' => 'required',
    'password' => 'required'
  ]);

   $username = $request->username;
   $password = $request->password;

   $data = Peserta::where('username',$username)->first();
   $user = User::where('username', $username)->first(); 
        if($data){ //apakah email tersebut ada atau tidak

          if(Hash::check($password,$data->password)){
            Session::put('id',$data->id_peserta);
            Session::put('username',$data->username);
            Session::put('level','Peserta');
            Session::put('login',TRUE);
            return redirect('/dashboard');
          }
          else{
            return redirect('sign_in')->with('alert','Usernam atau Password, Salah !');
          }
        }else if($user){
          if(Hash::check($password,$user->password)){
            Session::put('id',$user->id);
            Session::put('username',$user->username);
            Session::put('level', $user->level);
            Session::put('login',TRUE);
            return redirect('/dashboard');
          }
        }
        else{
         return redirect('/sign_in')->with('alert','Username atau Password, Salah!');
       }
     }

     public function dashboard()
     {
      return view('admin.dashboard');
    }	
    public function index()
    {
      return view('signin');
    }
    public function Logout(Request $request)
    {
     Session::flush();
     return redirect('/sign_in')->with('alert','Kamu sudah logout');
   }
 }
