@extends('publik.main')
@section('konten')
<header class="masthead" style="background-image: url('../publik/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-heading">
          <h1>{{$artikel->judul}}</h1>
          <span class="meta">Posted by
            <a href="#">Qatulistiwa Islam</a>
            on  {{ \Carbon\Carbon::parse($artikel->tgl_artikel)->toDayDateTimeString()}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="card text-black bg-white mb-3" style="width: 100%;">
          <div class="card-body">
            <p class="card-text"> {!! nl2br(e($artikel->isi_artikel)) !!}</p>
          </div>
        </div>
      </div>
    </div>
  </article>

  <hr>

  @endsection