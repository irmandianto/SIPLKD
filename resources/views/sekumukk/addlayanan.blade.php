@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/klayanan"><i class="fa fa-dashboard"></i> Kelola Data Layanan</a></li>
		<li class="active">Tambah Layanan</li>
	</ol>
	<section class="content-header">
		<small>Tambah Layanan</small>
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
						<h3 class="box-title">Tambah Layanan </h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('klayanan.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputText1">Judul Layanan</label>
								<input type="text" name="judul_layanan" class="form-control" id="exampleInputText1" placeholder="Judul Layanan">
							</div>

							<div class="form-group">
								<label for="exampleInputFile">Foto Layanan</label>
								<input type="file" name="foto_layanan" id="exampleInputFile">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a  href="/klayanan" type="button" class="btn btn-warning">Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection