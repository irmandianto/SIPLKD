@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/bahan"><i class="fa fa-dashboard"></i> Bahan Materi Kajian Dhuha </a></li>
		<li class="active">Unggah Bahan Materi Kajian Dhuha</li>
	</ol>
	<section class="content-header">
		<small>Tambah Bahan Materi Kajian Dhuha</small>
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
						<h3 class="box-title">Unggah Bahan Materi Kajian Dhuha</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('materi.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputText1">Judul Materi</label>
								<input type="text" name="judul_materi" class="form-control" id="exampleInputText1" placeholder="Judul Materi">
							</div>
							<div class="form-group">
								<label for="exampleInputFile">File</label>
								<input type="file" name="file" id="exampleInputFile">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection