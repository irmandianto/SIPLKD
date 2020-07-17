@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/pengumumans"><i class="fa fa-dashboard"></i> Kelola Pengumuman</a></li>
		<li class="active">Edit Pengumuman</li>
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
						<h3 class="box-title">Edit Pengumuman</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('pengumumans.update',$cari->id)}}" method="POST">
						@method('PATCH')
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Judul</label>
								<input type="text" name="judul" class="form-control" id="exampleInputText1" placeholder="Judul Pengumuman" value="{{ $cari-> judul}}">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Pengumuman</label>
								<input type="text" name="isi_pengumuman" class="form-control" id="exampleInputText1" placeholder="Isi Pengumuman" value="{{ $cari->isi_pengumuman}}">
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