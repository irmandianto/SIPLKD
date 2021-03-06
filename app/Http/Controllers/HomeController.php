<?php

namespace App\Http\Controllers;

use App\Event;
use App\Article;
use App\Layanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$artikel = Article::paginate(10);
		return view('publik.index',compact('artikel'));
	}
	public function show($id)
	{
		$artikel = Article::find($id);

		return view('publik.detail',compact('artikel'));
	}
	public function layanan()
	{
		$layanan = Layanan::all();
		return view('publik.layanan',compact('layanan'));
	} 
	public function event()
	{
		$event = Event::all();
		return view('publik.event',compact('event'));
	}
	public function about()
	{
		return view('publik.about');
	}
}
