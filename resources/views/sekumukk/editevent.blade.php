@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/event"><i class="fa fa-dashboard"></i> Kelola Data Event</a></li>
		<li class="active">Tambah Event</li>
	</ol>
	<section class="content-header">
		<small>Edit Event HomePage</small>
<!-- 		<h1>
			Unggah Bahan Materi Kajian Dhuha
		</h1> -->

	</section>
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<div class="box-header with-border">
						<h3 class="box-title">Edit Event HomePage</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('event.update',$event->id)}}" method="POST" enctype="multipart/form-data">
						@method('PATCH')
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputText1">Nama Event</label>
								<input type="text" name="nama_event" class="form-control" id="exampleInputText1" placeholder="Nama Event" value="{{$event->nama_event}}">
							</div>
							<div class="form-group">
								<label for="exampleInputText1">Deskripsi Event</label>
								<input type="text" name="deskripsi_event" class="form-control" id="exampleInputText1" placeholder="Deskripsi event" value="{{$event->deskripsi_event}}">
							</div>

							<div class="form-group">
								<label for="exampleInputFile">Foto Event</label>
								<input type="file" name="foto_event" id="exampleInputFile">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a  href="/event" type="button" class="btn btn-warning">Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection