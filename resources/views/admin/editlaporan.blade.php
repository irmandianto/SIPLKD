@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/laporan"><i class="fa fa-dashboard"></i> Laporan Kajian Dhuha </a></li>
		<li class="active">Edit Laporan Kajian Dhuha</li>
	</ol>
	<section class="content-header">
		<small>Edit Kajian Kajian Dhuha</small>
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
						<h3 class="box-title">Edit Laporan Kajian Dhuha</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('laporan.update',$data->id_laporankajian)}}" method="POST" enctype="multipart/form-data">
						@method('PATCH')
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputText1">Judul Laporan</label>
								<input type="text" name="judul_laporan" class="form-control" id="exampleInputText1" placeholder="Judul Laporan" value="{{$data->judul_laporan}}">
							</div>
							<div class="form-group">
								<label for="exampleInputFile">File</label>
								<input type="file" name="file_laporan" id="exampleInputFile">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							
							<a href="/laporan" type="submit" class="btn btn-warning">Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection