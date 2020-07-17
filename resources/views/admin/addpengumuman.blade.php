@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/pengumumans"><i class="fa fa-dashboard"></i> Kelola Pengumuman</a></li>
		<li class="active">Tamabah Pengumuman</li>
	</ol>
	<section class="content-header">
		<h1>
			Kelola Pengumuman
			<small>Control panel</small>
		</h1>

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
						<h3 class="box-title">Tambah Pengumuman</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('pengumumans.store')}}" method="POST">
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Judul</label>
								<input type="text" name="judul" class="form-control" id="exampleInputText1" placeholder="Judul Pengumuman">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Pengumuman</label>
								<input type="text" name="isi_pengumuman" class="form-control" id="exampleInputText1" placeholder="Isi Pengumuman">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="/pengumumans" type="button" class="btn btn-warning">Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection