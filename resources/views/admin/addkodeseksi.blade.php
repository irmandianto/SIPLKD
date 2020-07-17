@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/kodeseksi"><i class="fa fa-dashboard"></i> Kelola Kode Seksi Peserta</a></li>
		<li class="active">Tambah Kode Seksi</li>
	</ol>
	<section class="content-header">
		<h1>
			Kelola Kode Seksi
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
						<h3 class="box-title">Tambah Kode Seksi Peserta</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" action="{{route('kodeseksi.store')}}" method="POST">
						@csrf
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Kode Seksi Peserta</label>
								<input type="text" name="kode_seksi_peserta" class="form-control" id="exampleInputText1" placeholder="Kode Seksi Peserta">
							</div>
						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a type="button" href="/kodeseksi" class="btn btn-warning">Kembali</a>
						</div>

					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection