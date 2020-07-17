@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/bahan"><i class="fa fa-dashboard"></i> Entri Nilai Kajian Dhuha </a></li>
		<li class="active">Tambah Nilai</li>
	</ol>
	<section class="content-header">
		<small>Tambah Nilai</small>
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
						<h3 class="box-title">Entri Nilai Kajian Dhuha</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2">
								<h4>Nama Lengkap </h4>
								<h4>NIM  </h4>
								<h4>Progam Studi </h4>
							</div>
							<div class="col-md-8">
								<h4>: {{$cari->nama_lengkap}}</h4>
								<h4>: {{$cari->nim}}</h4>
								<h4>: {{$cari->progamstudi}}</h4>
							</div>
							<div class="col-md-1">
								<img src="{{Storage::url('foto/'.$cari->foto)}}" width="100" height="100" class="rounded" alt="Foto Belum Di Upload">
							</div>
						</div>
					</div>
					<form role="form" action="/entrinilai/{{$carikajian->id_pesertakajian}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="box-header with-border">
							<h6>Entri Nilai Kajian Dhuha</h6>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-5 text-right">

										<label>Kehadiran</label> 	 <input type="number" name="kehadiran"><br>
										<label>Keaktifan</label> 	 <input type="number" name="keaktifan"><br>
										<label>Praktik Shalat Jenazah</label> 	 <input type="number" name="praktik_ibadah"><br>
										<label>Ujian Akhir</label> 	 <input type="number" name="ujianakhir">
									</div>
									<div class="col-md-7 text-left">
										<label>Huruf</label> 	 <input type="text" name="huruf_kehadiran" style="width: 90%"><br>
										<label>Huruf</label> 	 <input type="text" name="huruf_keaktifan" style="width: 90%"><br>
										<label>Huruf</label> 	 <input type="text" name="huruf_praktikibadah" style="width: 90%"><br>
										<label>Huruf</label> 	 <input type="text" name="huruf_ujianakhir" style="width: 90%">
									</div>
								</div>
							</div>

							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a href="/entrinilai" type="button" class="btn btn-warning">Kembali</a>
							</div>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>

</div>

@endsection