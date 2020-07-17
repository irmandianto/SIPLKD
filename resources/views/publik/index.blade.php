@extends('publik.main')
@section('konten')

<!-- Page Header -->
<header class="masthead" style="background-image: url('publik/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Qatulistiwa Islam</h1>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($artikel as $artikels)
      <div class="post-preview">
        <a href="/detail/{{$artikels->id}}">
          <h2 class="post-title">
            {{$artikels->judul}}
          </h2>
          <h3 class="post-subtitle">
            {{ Str::limit($artikels->isi_artikel, 30) }}
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#">Qatulistiwa Islam</a>
          on  {{ \Carbon\Carbon::parse($artikels->tgl_artikel)->toDayDateTimeString()}}</p>
        </div>
        @endforeach
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <div class="row justify-content-md-center">
            {{ $artikel->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>

  @endsection
