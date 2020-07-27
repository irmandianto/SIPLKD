@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/jadwal"><i class="fa fa-dashboard"></i> Kelola Jadwal</a></li>
		<li class="active">Edit Jadwal</li>
	</ol>
	<section class="content-header">
		<h1>
			Kelola Jadwal
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
						<h3 class="box-title">Edit Jadwal</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('jadwal.update',$carijawdal->id_jadwal)}}" method="POST">
						@method('PATCH')
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Hari Kajian</label>
								<input type="text" name="hari_kajian" class="form-control" id="exampleInputText1" placeholder="Hari Kajian" value="{{$carijawdal->hari_kajian}}">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Jam Kajian</label>
								<input type="time" name="jam_kajian" class="form-control" placeholder="Jam Kajian" value="{{$carijawdal->jam_kajian}}">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Akhir Kajian</label>
								<input type="time" name="akhir_kajian" class="form-control" placeholder="Akhir Kajian" value="{{$carijawdal->akhir_kajian}}">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
								<a href="/jadwal" type="submit" class="btn btn-warning">Kembali</a>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection