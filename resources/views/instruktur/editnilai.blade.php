@extends('layout.main')
@section('konten')
<!-- Main content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<ol class="breadcrumb">
		<li><a href="/listdatanilai"><i class="fa fa-dashboard"></i> Entri Nilai Kajian Dhuha</a></li>
		<li class="active">Edit Nilai</li>
	</ol>
	<section class="content-header">
		<small>Edit Nilai</small>
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
							<div class="col col-sm-3">
								<h4>Nama Lengkap </h4>
								<h4>NIM  </h4>
								<h4>Progam Studi </h4>
							</div>
							<div class="col col-sm-6">
								<h4>: {{$nilai->datapesertakajian->datapeserta['nama_lengkap']}}</h4>
								<h4>: {{$nilai->datapesertakajian->datapeserta['nim']}} </h4>
								<h4>: {{$nilai->datapesertakajian->datapeserta['progamstudi']}}</h4>
							</div>
							<div class="col col-sm-2">
								@if(empty($nilai->datapesertakajian->datapeserta['foto']))
								<img src="{{Storage::url('none.png')}}" width="100" height="100" alt="User Image" class="img-circle">
								@else
								<img src="{{ Storage::url('foto/'.$nilai->datapesertakajian->datapeserta['foto'])}}" width="100" height="100"  alt="User Image">
								@endif
							</div>
						</div>
					</div>
					<form role="form" action="/entrinilai/list/{{$nilai->id_nilai}}" method="POST" enctype="multipart/form-data">
						@method('PATCH')
						@csrf
						<div class="box-header with-border">
							<h6>Entri Nilai Kajian Dhuha</h6>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-3 text-right">
										<label>Kehadiran</label> 	 <br>
										<label>Keaktifan</label> 	 <br>
										<label>Ujian Akhir</label> 	 <br>
										<label>Praktik Shalat Jenazah</label> 	 <br>
									</div>
									<div class="col-sm-2">
										<input type="hidden" name="id_peserta" value="{{$nilai->id_peserta}}">
										<input type="number" name="kehadiran" style="max-width: 100%" value="{{$nilai->datapesertakajian->datanilai['nilai_kehadiran']}}"><br>
										<input type="number" name="keaktifan" value="{{$nilai->datapesertakajian->datanilai['nilai_keaktifan']}}" style="max-width: 100%"><br>
										<input type="number" name="ujianakhir" value="{{$nilai->datapesertakajian->datanilai['nilai_ujian']}}" style="max-width: 100%"><br>
										<input type="number" name="praktik_ibadah" value="{{$nilai->datapesertakajian->datanilai['praktik_ibadah']}}" style="max-width: 100%"><br>
									</div>
									<div class="col-sm-1 text-center">
										<label>Huruf</label> 	<br>
										<label>Huruf</label> 	<br>
										<label>Huruf</label> 	<br>
										<label>Huruf</label> 	
									</div>
									<div class="col-sm-6 text-left">
										<input type="text" name="huruf_kehadiran" value="{{$nilai->datapesertakajian->datanilai['huruf_kehadiran']}}" style="width: 100%"><br>
										<input type="text" name="huruf_keaktifan" value="{{$nilai->datapesertakajian->datanilai['huruf_keaktifan']}}" style="width: 100%"><br>
										<input type="text" name="huruf_ujianakhir" value="{{$nilai->datapesertakajian->datanilai['huruf_ujianakhir']}}" style="width: 100%"><br>
										<input type="text" name="huruf_praktikibadah" value="{{$nilai->datapesertakajian->datanilai['huruf_praktikibadah']}}" style="width: 100%"><br>
									</div>
								</div>
							</div>

							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a href="/listdatanilai" type="button" class="btn btn-warning">Kembali</a>
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