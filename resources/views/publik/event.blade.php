@extends('publik.main')
@section('konten')
<!-- Page Header -->
<header class="masthead" style="background-image: url('publik/img/home-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h2>Event Qatulistiwa Islam</h2>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="container">
	<div class="row justify-content-md-center">
		@foreach($event as $events)
		<div class="card" style="width: 18rem; margin: 20px;">
			<img class="card-img-top" src="{{Storage::url('event/'.$events->foto_event)}}" alt="Card image cap" width="200" height="200">
			<div class="card-body">
				<h5 class="card-title">{{$events->nama_event}}</h5>
				<p class="card-text">{{$events->deskripsi_event}}</p>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection